<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;
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
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
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
        if(!session()->has('url.intended'))
        {
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
        return view('auth.profile', compact('user'));
    }

    public function reset()
    {
        // $user = $this->userRepository->checkAuthUserAdmin();
        return view('auth.resetPass');
    }

    public function checkCode()
    {
        // $user = $this->userRepository->checkAuthUserAdmin();
        return view('auth.checkCode');
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
        if(is_null($admin))
        {
            $user = User::where('email', $request->email)->first();
        }

        if(Auth::guard('admin')->attempt($data) === false && Auth::guard('web')->attempt($data) === false )
        {
          return redirect()->back()->with('error', 'Email hoặc Mật khẩu không đúng');
        }

        if (Auth::guard('admin')->attempt($data, $remember) && !is_null($admin->is_admin)) {
          return redirect()->route('admin.dashboard');
        }else if(Auth::guard('web')->attempt($data, $remember) && is_null($user->is_admin))
        {
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

            return view('admin.auth.profile', compact('user'));
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

        // $passwordReset = PasswordReset::updateOrCreate([
        //     'email' => $user->email,
        // ], [
        //     'token' => Str::random(128),
        // ]);

        $strToken = Str::random(128);
        $token = str_replace('/', '', Hash::make($strToken));
        $array = [0,1,2,3,4,5,6,7,8,9];
        $code = Arr::random($array).Arr::random($array).Arr::random($array).Arr::random($array);

        // if ($passwordReset) {
        //     $user->notify(new ResetPasswordRequest($passwordReset->token));
        // }
        $tokenSuccess = DB::table('password_resets')->insert([
            'email' => request('email'),
            'token' => $token,
            'code' => $code,
            'created_at' =>Carbon::now(),
            'updated_at' =>Carbon::now()

        ]);

        if ($tokenSuccess) {
            Mail::to($request->email)->send(new SendMail($code,$token));
            return  redirect()->route('auth.check.code')->with('success', 'Gửi mã thành công. Hãy kiểm tra Gmail của mình');
        } else {
            $message = 'Yêu cầu của bạn đã xảy ra lỗi';
            return redirect()->back()->withErrors($message);
        }
        // return redirect()->route('auth.login')->with('success', 'Gửi mã thành công. Hãy kiểm tra Gmail của mình');

    }

    public function resetCodePassword(ResetPasswordV2Request $request)
    {
        try {
            $passwordReset = PasswordReset::where(['email' => $request->email])->orderBy('created_at','desc')->first();
            if ($passwordReset) {
                if($passwordReset->code != $request->code){
                    $message = trans('messages.admin.forgot_password.old');
                    return $this->errorResponse($message);
                }
                $afterTimenow = Carbon::now();
                $afterTimenow->subMinutes(30);
                if ($afterTimenow > $passwordReset->created_at) {
                    $message = trans('messages.admin.forgot_password.expired_code');
                    return $this->errorResponse($message);
                }
                $message = trans('messages.admin.forgot_password.correct');
                return $this->sendMessage($message);
            } else {
                $message = trans('messages.admin.forgot_password.not_found');
                return $this->errorResponse($message);
            }
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
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
