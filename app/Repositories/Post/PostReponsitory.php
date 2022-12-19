<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

class PostReponsitory extends BaseRepository implements PostRepositoryInterFace
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Post::class;
    }

    public function getProduct()
    {
        return $this->model->select('product_name')->take(5)->get();
    }
}
