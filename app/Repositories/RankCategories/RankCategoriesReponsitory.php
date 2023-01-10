<?php

namespace App\Repositories\RankCategories;

use App\Models\Category;
use App\Models\RankCategory;
use App\Repositories\BaseRepository;

class RankCategoriesReponsitory extends BaseRepository implements RankCategoriesRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return RankCategory::class;
    }

    public function getAll()
    {
        return $this->model->select('name')->take(5)->get();
    }



}
