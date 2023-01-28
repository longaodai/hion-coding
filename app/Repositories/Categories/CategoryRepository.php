<?php

namespace App\Repositories\Categories;

use App\Models\Categories;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Categories $app)
    {
        $this->app = $app;
        
        parent::__construct();
    }

    public function getList($data = null, $options = null)
    {
        return parent::getList();
    }

    public function all($data = null)
    {
        return parent::all();
    }

    public function update($params = null, $options = null)
    {
        $this->mark($options);
        
        return parent::update($params, $options);
    }

    public function mark($params = null)
    {
        if (!empty($params) && !empty($params->get('id'))) {
            $this->thisModel('where', 'id', $params->get('id'));
        }

        return parent::mark($params);
    }
}