<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function login(){
      return view('admin.auth.login');
    }

    public function registration(){
        return view('web.news.register');
    }

    public function edit(){
        $user = $this->userRepository->checkAuthUserAdmin();
        return view('admin.auth.editProfile', compact('user'));
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            Auth()->user()->update(['image'=>$filename]);
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

    public function postLogin(AdminLoginRequest $request){
      $data = $request->getData();
      $remember = $request->get('remember');
      if (auth('admin')->attempt($data, $remember)) {
        return redirect()->route('admin.dashboard');
      }else if(auth('web')->attempt($data, $remember))
      {
        return redirect()->route('web.home');
      }
    }

    public function getMe(){
        $user = $this->userRepository->checkAuthUserAdmin();
        return view('admin.auth.profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
        $data = $request->getDataUser();
        $user = $this->userRepository->checkAuthUserAdmin();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $data['image'] = $this->uploadImage($image, 'avatars');
          }else{
            $data['image'] = $request->get('image');
          }

        $user->update($data);

        return view('admin.auth.profile', compact('user'));
    } catch (\Exception $e) {
        return redirect()->back()->withErrors($e->getMessage());
    } //end try
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