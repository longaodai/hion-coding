<?php

namespace App\Services\Posts;

interface PostServiceInterface
{
    /**
     * @param null $data
     * @param null $options
     */
    public function all($data = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function getList($data = null, $options = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function store($data = null, $options = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function update($data = null, $options = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function show($data = null, $options = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function getFirstBy($data = null, $options = null);

    /**
     * @param null $data
     * @param null $options
     */
    public function delete($data = null, $options = null);
}
