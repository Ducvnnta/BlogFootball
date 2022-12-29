<?php

namespace App\Services\News;

use App\Repositories\News\NewsRepositoryInterFace;

class NewsService implements NewsServiceInterface
{
   /**
     * @var $newsRepositoryInterFace
     * @var $sendMailService
     */
    protected $newsRepositoryInterFace;

    public function __construct(
        NewsRepositoryInterFace $newsRepositoryInterFace
    ) {
        $this->newsRepositoryInterFace = $newsRepositoryInterFace;
    }

    public function getPostById($id)
    {

    }


}

