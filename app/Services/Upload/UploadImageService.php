<?php

namespace App\Services\Upload;

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

    public static function addImage($request)
    {
        // $path = null;
        // if (isset($image)) {
        //     $pos = strpos($image, 'uploads/images/s3/');
        //     if ($pos !== false) {
        //         return $image;
        //     }
        //     $path = $this->moveImagetoPublic($image, $folderName);
        //     if ($path == null) {
        //         return null;
        //     }
        // }
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return $filename;
    }

    // public function moveImagetoPublic($file_path, $end_point)
    // {

    //     $img_name = basename($file_path);

    //     $public_path = '/uploads/' . $end_point;

    //     File::makeDirectory(public_path($public_path), $mode = 0777, true, true);
    //     if (File::exists($file_path)) {
    //         File::copy($file_path, public_path($public_path) . '/' . $img_name);
    //         unlink($file_path);
    //         return $public_path . '/' . $img_name;
    //     } else {
    //         return null;
    //     }
    //     return $file_path;
    // }

}
