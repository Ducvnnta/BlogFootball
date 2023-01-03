<?php

namespace App\Repositories\News;


interface NewsRepositoryInterface
{
    public function incrementReadCount($new);

    public function getAll();
}
