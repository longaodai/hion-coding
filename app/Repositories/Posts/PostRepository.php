<?php

namespace App\Repositories\Posts;

use App\Models\Posts;
use Illuminate\Support\Collection;
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

        return parent::getList($data, $options);
    }

    public function all($data = null)
    {
        $this->thisModel('orderBy', 'updated_at', 'DESC');

        return parent::all($data);
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

    public function filter($params = null)
    {
        $this->setModel();

        if (!empty($params) && $params instanceof Collection) {
            if (!empty($params->get('is_active'))) {
                $this->thisModel('where', 'post_active', $params->get('is_active'));
            }

            if (!empty($params->get('post_slug'))) {
                $this->thisModel('where', 'post_slug', $params->get('post_slug'));
            }

            if (!empty($params->get('with_users'))) {
                $this->thisModel('with', 'user');
            }

            if (!empty($params->get('with_category'))) {
                $this->thisModel('with', 'category');
            }

            if (!empty($params->get('limit'))) {
                $this->thisModel('limit', $params->get('limit'));
            }

            if (!empty($params->get('not_post_id'))) {
                $this->thisModel('where', 'id', '!=', $params->get('not_post_id'));
            }
        }

        return parent::filter($params);
    }
}