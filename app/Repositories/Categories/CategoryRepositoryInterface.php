<?php

namespace App\Repositories\Categories;

interface CategoryRepositoryInterface
{
    /**
     * @param null $data
     */
    public function all($data = null);

    /**
     * @param null $data
     */
    public function getList($data = null);

    /**
     * @param null $data
     */
    public function store($data = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function update($data = null, $options = null);

    /**
     * @param null $data
     */
    public function show($data = null);

    /**
     * @param null $data
     */
    public function getFirstBy($data = null);

    /**
     * @param null $data
     */
    public function delete($data = null);
}