<?php

namespace App\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class BaseRepository
 *
 * @package App\Services\Repositories
 */
abstract class BaseRepository
{
    /**
     * @var Container
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @return mixed
     */
    abstract function model();

    /**
     * @param null $modelName
     *
     * @return Model
     *
     * @throws ModelNotFoundException
     */
    public function makeModel($modelName = null)
    {
        $model = empty($modelName) ? $this->app->make($this->model()) : $this->app->make($modelName);

        if (!$model instanceof Model) {
            throw new ModelNotFoundException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model->newQuery();
    }

    /**
     * @param null $modelName
     *
     * @return Model
     */
    public function setModel($modelName = null)
    {
        return $this->makeModel($modelName);
    }

    /**
     * Get table name
     *
     * @return mixed
     */
    public function getTable()
    {
        return $this->getModel()->getTable();
    }

    /**
     * @param bool $ignore
     *
     * @return mixed
     */
    public function resetModel()
    {
        $this->model = $this->makeModel();

        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->method('getModel');
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function method($name)
    {
        $argList = func_get_args();
        unset($argList[0]);

        return $this->model->{$name}(...$argList);
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function all($params)
    {
        $this->filter($params);

        return $this->method('get');
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function count($params)
    {
        $this->filter($params);

        return $this->method('count');
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function getList($params)
    {
        $this->filter($params);

        return $this->method('paginate', $this->getLimitPaginate($params));
    }

    /**
     * @param object $params
     *
     * @return int
     */
    protected function getLimitPaginate($params)
    {
        return (!empty($params->option('limit'))) ? $params->option('limit') : PAGINATION_PAGE_DEFAULT;
    }


    /**
     * @param object $params
     *
     * @return mixed
     */
    public function find($params)
    {
        return $this->method('find', $params->get('id'));
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function first($params)
    {
        $this->filter($params);

        return $this->method('first');
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function create($params)
    {
        return $this->method('create', $params->get());
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function insert($params)
    {
        return $this->method('insert', $params->get());
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function update($params)
    {
        $this->mask($params);

        return $this->method('update', $params->get());
    }

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function destroy($params)
    {
        $this->filter($params);

        return $this->method('delete');
    }

    /**
     * Filter for select
     *
     * @param object $params
     *
     * @return mixed
     */
    protected function filter($params)
    {
        return $this;
    }

    /**
     * Filter for update
     *
     * @param object $params
     *
     * @return mixed
     */
    protected function mask($params)
    {
        return $this;
    }
}
