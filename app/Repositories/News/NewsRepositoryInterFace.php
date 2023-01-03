<?php

namespace App\Repositories\News;


interface NewsRepositoryInterface
{
    public function incrementReadCount($id);

    public function getAll();
}
