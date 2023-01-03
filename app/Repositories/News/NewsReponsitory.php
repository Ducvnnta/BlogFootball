<?php

namespace App\Repositories\News;

use App\Models\News;
use App\Repositories\BaseRepository;

class NewsReponsitory extends BaseRepository implements NewsRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return News::class;
    }

    public function getProduct()
    {
        return $this->model->select('product_name')->take(5)->get();
    }

    public function incrementReadCount($new) {
        $new->increment('reads', 1);

        return $new->save();
    }


}
