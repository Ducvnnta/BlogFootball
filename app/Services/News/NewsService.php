<?php

namespace App\Services\News;

use App\Repositories\News\NewsRepositoryInterface;

class NewsService implements NewsServiceInterface
{
   /**
     * @var $newsRepositoryInterface
     * @var $sendMailService
     */
    protected $newsRepositoryInterFace;

    public function __construct(
        NewsRepositoryInterface $newsRepositoryInterface
    ) {
        $this->newsRepositoryInterface = $newsRepositoryInterface;
    }

    public function getPostById($id)
    {

    }


}

