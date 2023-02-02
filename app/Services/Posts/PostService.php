<?php

namespace App\Services\Posts;

use App\Repositories\Posts\PostRepositoryInterface;
use App\Services\BaseService;

class PostService extends BaseService implements PostServiceInterface
{
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->repository = $postRepository;
    }

    public function getList($data = null, $options = null)
    {
        return parent::getList($data, $options);
    }
}