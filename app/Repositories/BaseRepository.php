<?php

namespace App\Repositories;

abstract class  BaseRepository
{
    protected $app;
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Set model
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function setModel()
    {
        return $this->model = $this->app->newQuery();
    }

    /**
     * This model
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function thisModel($query)
    {
        $array = func_get_args();
        unset($array[0]);

        return $this->model->{$query}(...$array);
    }

    /**
     * Get all
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function all($data = null)
    {
        $this->filter($data);

        return $this->model->get();
    }

    /**
     * Get list
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($data = null, $params = null)
    {
        $this->filter($data);
        
        return $this->model->paginate($this->getPagination($params));
    }

    /**
     * Handle pagination
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    private function getPagination($params)
    {   
        if (empty($params)) return PAGINATION_PAGE_DEFAULT;

        return !empty($params->get('set_pagination')) 
            ? $params->get('set_pagination') : PAGINATION_PAGE_DEFAULT;
    }

     /**
     * @param null $params
     */
    public function store($params = null)
    {
        return $this->app->create($params);
    }

    /**
     * @param null $params
     */
    public function update($params = null, $options = null)
    {
        return $this->model->update($params);
    }

    /**
     * @param null $params
     */
    public function getFirstBy($params = null)
    {
        $this->filter($params);

        return $this->model->first();
    }

     /**
     * @param null $params
     */
    public function show($params = null)
    {
        return $this->app->find($params);
    }

    /**
     * @param null $data
     */
    public function delete($data = null, $options = null)
    {
        $this->filter($data);

        return $this->model->delete();
    }

    /**
     * @param null $params
     */
    public function insert($params = null)
    {
        return $this->app->insert($params);
    }

    /**
     * @param null $params
     */
    public function filter($params = null)
    {
        return $this;
    }

    /**
     * @param null $params
     */
    public function mark($params = null)
    {
        return $this;
    }
}