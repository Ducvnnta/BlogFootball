<?php

namespace App\Services\User;

use App\Models\User;

interface UserServiceInterface
{
    public function getListAdminUser($perPage, $page);

    public function registerUser($request);

    public function checkUserExist($email);

    public function checkTokenDeviceExists($deviceToken);
}
