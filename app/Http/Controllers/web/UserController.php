<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ApiResponser;
    use UploadTrait;

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

    public function edit(){
        $user = $this->userRepository->checkAuthUserAdmin();
        return view('admin.auth.editProfile', compact('user'));
    }

    // public function update(UpdateProfileRequest $request, $id)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $news = User::findOrFail(Auth::id());
    //         $data = $request->getDataUser();
    //         if($request->hasFile('image')){
    //           $image = $request->file('image');
    //           $data['image'] = $this->uploadImage($image, 'news');
    //         }else{
    //           $data['image'] = $request->get('old_image_url');
    //         }
    //         $news->update($data);

    //         DB::commit();
    //         return redirect()->route('auth.profile', Auth::id())->withFlashSuccess('Cập nhật tin tức thành công');
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return redirect()->back()->withErrors($e->getMessage());
    //     } //end try
    // }
}
