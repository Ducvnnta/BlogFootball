<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\User;
use App\Traits\ApiResponser;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class AdminUserController extends Controller

{
    use ApiResponser;
    use UploadTrait;

    public function listAdmin(Request $request)
    {
        $perPage       = $request->per_page;
        $page          = $request->page;
        $perPage = $perPage ? $perPage : 10;
        $users = AdminUser::orderBy('id', 'DESC');
        $users = $users->paginate($perPage);
        return view('admin.user.list', compact('users'));
    }

    public function listUser(Request $request)
    {
        $perPage       = $request->per_page;
        $page          = $request->page;
        $perPage = $perPage ? $perPage : 10;
        $users = User::orderBy('id', 'DESC');
        $users = $users->paginate($perPage);
        return view('admin.user.list', compact('users'));
    }

}
