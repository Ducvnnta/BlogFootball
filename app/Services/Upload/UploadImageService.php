<?php

namespace App\Services\Uppload;

use App\Repositories\User\UserReponsitory;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceInterface;
use App\Traits\RenderPagination;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Helper\Helper;

class UploadImageService implements UploadImageServiceInterface
{
    use RenderPagination;
    /**
     * @var $uploadImageRepository
     * @var $userServiceInterface
     * @var $userRepositoryInterface
     *
     */
    protected $userRepository;
    protected $userServiceInterface;
    protected $userRepositoryInterface;



    public function __construct(
        UploadImageServiceInterface $uploadImageRepository,
        UserServiceInterface $userServiceInterface,
        UserRepositoryInterface $userRepositoryInterface
    ) {
        $this->uploadImageRepository = $uploadImageRepository;
    }

    public static function uploadImage($request)
    {
        // validate image and title
        $validated = $request->validate([
            'user_id' => 'required',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $image_names = [];
        // loop through images and save to /uploads directory
        foreach ($request->file('images') as $image) {
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/', $name);
            dd();
            $image_names[] = $name;
        }

        $user = $user_id->userRepositoryInterface->checkAuthUserAdmin();
        $post = new checkUserExist;
        $post->title = $request->title;
        $post->images = json_encode($image_names);

        $post->save();

        return redirect()
            ->back()
            ->with('success', 'Post created successfully.');
    }
}
