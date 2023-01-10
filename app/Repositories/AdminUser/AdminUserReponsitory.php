<?php

namespace App\Repositories\AdminUser;

use App\Models\Category;
use App\Repositories\BaseRepository;

class AdminUserReponsitory extends BaseRepository implements CategoryRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Category::class;
    }

    public function getAll()
    {
        return $this->model->select('product_name')->take(5)->get();
    }



}
