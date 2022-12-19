<?php

namespace App\Services\Post;

use App\Repositories\Post\PostReponsitory;

class PostService implements PostServiceInterface
{
   /**
     * @var $postRepository
     * @var $sendMailService
     */
    protected $postRepository;

    public function __construct(
        PostReponsitory $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    public function getPostById($id)
    {

    }
}

