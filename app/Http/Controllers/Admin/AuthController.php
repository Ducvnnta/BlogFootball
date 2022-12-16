<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
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

        return back()->with('success', 'User created successfully.');
    }

    public function postLogin(AdminLoginRequest $request){
      $data = $request->getData();
      $remember = $request->get('remember');

      if (auth('admin')->attempt($data, $remember)) {
        return redirect()->route('admin.dashboard');
      }

      return redirect()->back()->withErrors("Email hoặc mật khẩu không đúng. Vui lòng kiểm tra lại!");
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
