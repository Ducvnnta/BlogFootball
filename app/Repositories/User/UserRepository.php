<?php

namespace App\Repositories\User;

use App\Models\AdminUser;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        if(Auth::guard('admin')->check())
        {
            return \App\Models\AdminUser::class;

        }
        else{
            return \App\Models\User::class;
        }
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

    public function checkAuthUserAdmin()
    {
        if(Auth::check() === false)
        {
            return view();
        }else if(Auth::check() && !is_null(Auth::user()->is_admin))
        {
            $user = AdminUser::findOrFail(Auth::id());

        }else if(Auth::check() && is_null(Auth::user()->is_admin))
        {

            $user = User::findOrFail(Auth::id());
        }
        return $user;
    }

}
