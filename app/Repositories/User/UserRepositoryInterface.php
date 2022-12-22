<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getListAdminUser();

    public function getPaginateSortId($perPage, $page, $columns = ['*']);

    public function findByEmail($email): ?User;

    public function checkAuthUserAdmin($id);
}
