<?php

namespace App\Repositories\Posts;

interface PostRepositoryInterface
{
    /**
     * @param object $params
     *
     * @return mixed
     */
    public function all($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function getList($params);

    /**
     * @param null $data
     */
    public function create($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function update($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function find($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function first($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function insert($params);

    /**
     * @param object $params
     *
     * @return mixed
     */
    public function destroy($params);
}
