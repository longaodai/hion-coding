<?php

namespace App\Services;

abstract class  BaseService
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function all($data = null, $options = null)
    {
        return $this->repository->all($data, $options);
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function getList($data = null, $options = null)
    {
        return $this->repository->getList($data, $options);
    }

     /**
     * @param null $data
     * @param null $options
     */
    public function store($data = null, $options = null)
    {
        return $this->repository->store($data, $options);
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function update($data = null, $options = null)
    {
        return $this->repository->update($data, $options);
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function getFirstBy($data = null, $options = null)
    {
        return $this->repository->getFirstBy($data, $options);
    }

     /**
     * @param null $data
     * @param null $options
     */
    public function show($data = null, $options = null)
    {
        return $this->repository->show($data, $options);
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function delete($data = null, $options = null)
    {
        return $this->repository->delete($data, $options);
    }

    /**
     * @param null $data
     * @param null $options
     */
    public function insert($data = null, $options = null)
    {
        return $this->repository->insert($data, $options);
    }
}