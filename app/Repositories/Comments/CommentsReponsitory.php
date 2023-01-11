<?php

namespace App\Repositories\Comments;

use App\Models\Comment;
use App\Repositories\BaseRepository;

class CommentsReponsitory extends BaseRepository implements CommentsRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Comment::class;
    }

    public function getAll()
    {
        return $this->model->all();
    }



}
