<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends BaseController
{
    use ApiResponser;

    /**
     * @var $userService
     */
    protected $userRepository;
    protected $userService;

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

    public function getMe($id){
        $user = User::findOrFail($id);
        return view('admin.auth.profile', compact('user'));
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }
}
