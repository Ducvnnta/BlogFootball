<?php

namespace App\Repositories\News;


interface NewsRepositoryInterFace
{
    public function incrementReadCount($id);

    public function getAll();
}
