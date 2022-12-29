<?php

namespace App\Services\User;

use App\Repositories\User\UserReponsitory;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\Upload\UploadImageService;
use App\Traits\RenderPagination;
use App\Traits\UploadTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    use RenderPagination;
    use UploadTrait;

    /**
     * @var $userRepository
     * @var $sendMailService
     *
     */
    protected $userRepository;


    public function __construct(
        UserRepositoryInterface $userRepository

    ) {
        $this->userRepository = $userRepository;

    }

    public function getListAdminUser($perPage, $page)
    {
        $results = $this->userRepository->getPaginateSortId($perPage, $page, ["*"]);

        return $this->renderPagination($results, function ($value) {
            return $this->renderAdminUser($value);
        });
    }

    /**
     * @param $adminUser
     *
     * @return array
     */
    public function renderAdminUser($adminUser)
    {
        return [
            'id' => $adminUser->id,
            'name' => $adminUser->name,
            'hospital_name' => $adminUser->hospital_name,
            'is_admin' => $adminUser->is_admin
        ];
    }

    /**
     * @param App\Http\Requests\RegisterUserRequest $request
     *
     * @return bool
     */
    public function registerUser($request)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create([
                'email' =>  $request->email,
                'name' =>  $request->name,
                'password' => Hash::make($request->password),
            ]);
            DB::commit();
            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            report($e);
            return false;
        }
    }

    /**
     * @param  string $email
     * @return mixed
     */
    public function checkUserExist($email)
    {
        return $this->userRepository->findByEmail($email);
    }

    /**
     * @param  string $deviceToken
     * @return bool
     */
    function checkTokenDeviceExists($deviceToken)
    {
        if (!empty($deviceToken)) {
            return true;
        }

        return false;
    }

    public function updateProfile($request)
    {
        $id = Auth::id();
        $data = $request->getListAdminUser();

        // if($data['image']){
            // $data['image'] = $this->uploadImage($data['image'], 'avatar');
            // $filename = time() . '.' . $data['image']->extension_loaded();

            // $data['image']->move(public_path('images'), $filename);

            // save uploaded image filename here to your database

            // return back()
            //     ->with('success','Image uploaded successfully.')
            //     ->with('image', $filename);
        //   }
        $image = $request->file('image')->store('backend/images');
          if($data['image']){
            $file= $data['image'];
            $filename= date('YmdHi').$file;
            $file->move(public_path('public/backend/images'), $filename);
            $data['image']= $filename;
        }
        // $path = $request->file('image')->store('image');

        // if (!is_null($request->image)) {
        //     $image = $this->uploadImageService->addImage($request->image, 'Avatar');
        //     if (is_null($image)) {
        //         $message = trans('Không tìm thấy đường dẫn');
        //         return $this->errorResponse($message);
        //     }

        //     $data['image'] = $image;
        // }
        return $this->userRepository->update($id, $data);

    }
}
