<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\Auth\CheckCodeResetRequest;
use App\Http\Requests\Auth\ResetPassWordRequest;
use App\Models\AdminUser;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Upload\UploadImageService;
use App\Services\Upload\UploadImageServiceInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendMail;
use App\Models\News;
use App\Models\PasswordReset;
use Symfony\Component\HttpFoundation\Response;


class AuthController
{
    use ApiResponser;
    use UploadTrait;

    /**
     * @var $userService
     */
    protected $userRepository;
    protected $userService;
    // protected $uploadImageService;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        UserServiceInterface $userService

    ) {
        // $this->middleware('guest:admin')->except('logout');
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function login()
    {
        if (!session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.register');
    }

    public function edit()
    {
        $user = $this->userRepository->checkAuthUserAdmin();
        return view('auth.editProfile', compact('user'));
    }

    public function getMe()
    {
        $user = $this->userRepository->checkAuthUserAdmin();
        $newsLasts = News::with('category')->orderBy('id', 'ASC')->limit(2)->get();
        $newAlls = News::all();
        $admins = AdminUser::all();
        $users = User::all();
        $newsReads = News::with('category')->orderBy('reads', 'DESC')->limit(2)->get();
        $totalNewsReads = News::all();
        return view('auth.profile', compact('user', 'newsLasts', 'newsReads', 'newAlls', 'totalNewsReads', 'admins', 'users'));
    }

    public function reset()
    {
        return view('auth.resetPass');
    }

    public function checkCode()
    {
        return view('auth.checkCode');
    }

    public function confirmPass()
    {
        return view('auth.confirmPass');
    }


    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            Auth()->user()->update(['image' => $filename]);
        }
        return redirect()->back();
    }

    /**
     * Register user by email
     *
     */
    public function register(RegisterUserRequest $request)
    {
        $result = $this->userService->registerUser($request);
        if (!$result) {
            $message = 'Unable To Register User.';
            $statusCode = Response::HTTP_BAD_REQUEST;

            return $this->errorResponse($message, $statusCode);
        }

        $message = 'Successfully register';
        $statusCode = Response::HTTP_OK;

        return redirect()->route('auth.login')->with('success', 'B???n ???? t???o t??i kho???n th??nh c??ng');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $data = $request->getData();
        $remember = $request->get('remember');
        $admin = AdminUser::where('email', $request->email)->first();
        if (is_null($admin)) {
            $user = User::where('email', $request->email)->first();
        }
        if (Auth::guard('admin')->attempt($data) === false && Auth::guard('web')->attempt($data) === false) {
            return redirect()->back()->with('error', 'Email ho???c M???t kh???u kh??ng ????ng');
        }
        if (!is_null($admin)) {
            return redirect()->route('admin.dashboard');
        } else if(!is_null($user)) {
            // $url = 'http://localhost:8001/admin';
            // if(session()->get('url.intended') === $url)
            // {
            //     return redirect()->route('web.home');
            // }
            // return redirect(session()->get('url.intended'));
            return redirect()->route('web.home');

        }
    }



    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            $data = $request->getDataUser();
            $user = $this->userRepository->checkAuthUserAdmin();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $data['image'] = $this->uploadImage($image, 'avatars');
            } else {
                $data['image'] = $request->get('image');
            }

            $user->update($data);
            $newsLasts = News::with('category')->orderBy('id', 'ASC')->limit(2)->get();
            $newAlls = News::all();
            $admins = AdminUser::all();
            $users = User::all();
            $newsReads = News::with('category')->orderBy('reads', 'DESC')->limit(2)->get();
            $totalNewsReads = News::all();
            return view('auth.profile', compact('user', 'newsLasts', 'newsReads', 'newAlls', 'totalNewsReads', 'admins', 'users'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        } //end try
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (empty($user)) {
            $message = trans('Kh??ng t??m th???y d??? li???u c???a b???n');

            return  redirect()->back()->withError($message);
        }
        $strToken = Str::random(128);
        $token = str_replace('/', '', Hash::make($strToken));
        $array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $code = Arr::random($array) . Arr::random($array) . Arr::random($array) . Arr::random($array);
        if ($token) {
            session(['email' => $request->email]);
        }
        $tokenSuccess = DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'code' => $code,
            'created_at' => Carbon::now()

        ]);

        if ($tokenSuccess) {
            Mail::to($request->email)->send(new SendMail($code, $token));
            return  redirect()->route('user.check.code')->with('success', 'G???i m?? th??nh c??ng. H??y ki???m tra Gmail c???a m??nh');
        } else {
            $message = 'Y??u c???u c???a b???n ???? x???y ra l???i';
            return redirect()->back()->with('error', $message);
        }
        // return redirect()->route('auth.login')->with('success', 'G???i m?? th??nh c??ng. H??y ki???m tra Gmail c???a m??nh');

    }

    public function resetCodePassword(CheckCodeResetRequest $request)
    {
        $email = session()->get('email');
        $passwordReset = PasswordReset::where('email', $email)->orderBy('id', 'DESC')->first();
        if ($passwordReset) {
            if ($passwordReset->code != $request->code) {
                return redirect()->back()->with('error', 'Code kh??ng ????ng h??y l???y code m???i nh???t !');
            }
            $afterTimenow = Carbon::now();
            $afterTimenow->subMinutes(30);
            if ($afterTimenow > $passwordReset->created_at) {
                return redirect()->back()->with('error', 'Code ???? h???t h???n h??y g???i l???i');
            }
            $message = trans('Code ????ng hay ?????i l???i m???t kh???u c???a b???n');
            return  redirect()->route('user.confirm.pass')->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'kh??ng t??m th???y code !');
        }
    }

    public function resetEmailPassword(ResetPassWordRequest $request)
    {
        $email = session()->get('email');
        $passwordReset = PasswordReset::where('email', $email)->orderBy('id', 'desc')->first();
        if ($passwordReset) {
            if ($passwordReset->email != $request->email) {
                return redirect()->back()->with('error', 'Email kh??ng ????ng xin hay ki???m tra l???i!');
            }
            $afterTimenow = Carbon::now();
            $afterTimenow->subMinutes(30);
            if ($afterTimenow > $passwordReset->created_at) {
                return redirect()->back()->with('error', 'Code ???? h???t hi???u l???c xin hay y??u c???u l???i!');
            }
            PasswordReset::where('email', $request->email)->delete();
            User::where('email', $request->email)->update([
                'password' => bcrypt($request['password'])
            ]);
            return  redirect()->route('auth.login')->with('success', 'Thay ?????i m???t kh???u th??nh c??ng h??y ????ng nh???p l???i');
        } else {
            return redirect()->back()->with('error', 'Kh??ng t??m th???y t??i kho???n h??y ki???m tra l???i!');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logoutAuth()
    {
        auth()->logout();

        return redirect()->route('web.home');
    }
}
