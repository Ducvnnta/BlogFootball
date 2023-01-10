<?php

namespace App\Services\AdminUser;

interface AdminUserServiceInterface
{

    public function create($request);

    public function getCategoryById($id);

    public function update($request, $id);

    public function delete($id);

}
