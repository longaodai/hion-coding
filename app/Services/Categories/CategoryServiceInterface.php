<?php

namespace App\Services\Categories;

interface CategoryServiceInterface
{
    /**
     * @param $data
     * @param $options
     *
     * @return object
     */
    public function all($data = null, $options = null);

    /**
     * @param $data
     * @param $options
     *
     * @return object
     */
    public function getList($data = null, $options = null);

    /**
     * @param $data
     * @param $options
     *
     * @return object
     */
    public function show($data = null, $options = null);

    /**
     * @param $data
     * @param $options
     *
     * @return object
     */
    public function getFirstBy($data = null, $options = null);

    /**
     * @param $data
     * @param $options
     *
     * @return object
     *
     * @throws \Exception
     */
    public function store($data = null, $options = null);

    /**
     * @param $data
     * @param null $options
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function update($data = null, $options = null);

    /**
     * @param $data
     * @param null $options
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function updateOrCreate($data = null, $options = null);

    /**
     * @param $data
     * @param $options
     *
     * @return object
     *
     * @throws \Exception
     */
    public function destroy($data = null, $options = null);
}
