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

        return redirect()->route('auth.login')->with('success', 'Bạn đã tạo tài khoản thành công');
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
            return redirect()->back()->with('error', 'Email hoặc Mật khẩu không đúng');
        }
        if (!is_null($admin)) {
            return redirect()->route('admin.dashboard');
        } else if(!is_null($user)) {
            $url = 'http://localhost:8001/admin';
            if(session()->get('url.intended') === $url)
            {
                return redirect()->route('web.home');
            }
            return redirect(session()->get('url.intended'));
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
            $message = trans('Không tìm thấy dữ liệu của bạn');

            return  redirect()->back()->withError($message);
        }
        $strToken = Str::random(128);
        $token = str_replace('/', '', Hash::make($strToken));
        $array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $code = Arr::random($array) . Arr::random($array) . Arr::random($array) . Arr::random($array);
        if ($token) {
            session(['token' => $token]);
        }
        $tokenSuccess = DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'code' => $code,
            'created_at' => Carbon::now()

        ]);

        if ($tokenSuccess) {
            Mail::to($request->email)->send(new SendMail($code, $token));
            return  redirect()->route('user.check.code')->with('success', 'Gửi mã thành công. Hãy kiểm tra Gmail của mình');
        } else {
            $message = 'Yêu cầu của bạn đã xảy ra lỗi';
            return redirect()->back()->with('error', $message);
        }
        // return redirect()->route('auth.login')->with('success', 'Gửi mã thành công. Hãy kiểm tra Gmail của mình');

    }

    public function resetCodePassword(CheckCodeResetRequest $request)
    {
        $token = session()->get('token');
        dd($token);
        $passwordReset = PasswordReset::where('token', $token)->orderBy('id', 'DESC')->first();
        if ($passwordReset) {
            if ($passwordReset->code != $request->code) {
                return redirect()->back()->with('error', 'Code không đúng hãy lấy code mới nhất !');
            }
            $afterTimenow = Carbon::now();
            $afterTimenow->subMinutes(30);
            if ($afterTimenow > $passwordReset->created_at) {
                return redirect()->back()->with('error', 'Code đã hết hạn hãy gửi lại');
            }
            $message = trans('Code đúng hay đổi lại mật khẩu của bạn');
            return  redirect()->route('user.confirm.pass')->with('success', $message);
        } else {
            return redirect()->back()->with('error', 'không tìm thấy code !');
        }
    }

    public function resetEmailPassword(ResetPassWordRequest $request)
    {
        $email = session()->get('email');
        $passwordReset = PasswordReset::where('email', $email)->orderBy('id', 'desc')->first();
        if ($passwordReset) {
            if ($passwordReset->email != $request->email) {
                return redirect()->back()->with('error', 'Email không đúng xin hay kiểm tra lại!');
            }
            $afterTimenow = Carbon::now();
            $afterTimenow->subMinutes(30);
            if ($afterTimenow > $passwordReset->created_at) {
                return redirect()->back()->with('error', 'Code đã hết hiệu lực xin hay yêu cầu lại!');
            }
            PasswordReset::where('email', $request->email)->delete();
            User::where('email', $request->email)->update([
                'password' => bcrypt($request['password'])
            ]);
            return  redirect()->route('auth.login')->with('success', 'Thay đổi mật khẩu thành công hãy đăng nhập lại');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản hãy kiểm tra lại!');
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
