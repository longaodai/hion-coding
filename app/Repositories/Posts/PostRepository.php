<?php

namespace App\Repositories\Posts;

use App\Models\Posts;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Posts $app)
    {
        $this->app = $app;
        
        parent::__construct();
    }

    public function getList($data = null, $options = null)
    {
        $this->thisModel('orderBy', 'id', 'DESC');
        $this->thisModel('with', 'category');

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