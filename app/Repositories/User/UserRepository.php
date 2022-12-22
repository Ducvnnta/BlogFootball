<?php

namespace App\Repositories\User;

use App\Models\AdminUser;
use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\User::class;
    }

    /**
     *getUser
     *
     * @param
     * */
    public function getListAdminUser()
    {
        return $this->model->select('name')->take(5)->get();
    }

        /**
     * @param $perPage
     * @param $page
     * @param $columns
     *
     * @return mixed
     */
    public function getPaginateSortId($perPage, $page, $columns = ['*']) {
        return $this->model->select(
                'users.*',
            )
            // ->leftJoin('hospitals','admin_users.hospital_code','=','hospitals.hospital_code')
            ->orderBy('id', 'DESC')
            ->paginate($perPage, $columns, 'page', $page);
    }

    public function findByEmail($email): ?User
    {
        return $this->model->where('email', $email)->first();
    }

    public function checkAuthUserAdmin($id)
    {
        if(auth('admin')->check())
        {
            $user = AdminUser::findOrFail($id);
        }else if(auth('web')->check())
        {
            $user = User::findOrFail($id);
        }
        return $user;
    }
}
