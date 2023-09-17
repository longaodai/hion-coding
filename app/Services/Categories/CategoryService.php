<?php

namespace App\Services\Categories;

use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Services\BaseService;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function getList($data = null, $options = null)
    {
        return parent::getList();
    }
}
