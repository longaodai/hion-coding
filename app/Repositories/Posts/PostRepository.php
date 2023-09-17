<?php

namespace App\Repositories\Posts;

use App\Models\Posts;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * @param Posts $app
     */
    public function model()
    {
        return Posts::class;
    }

    /**
     * Get list
     *
     * @param  $params
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($params)
    {
        $this->method('orderBy', 'id', 'DESC');
        $this->method('with', 'category');

        return parent::getList($params);
    }

    /**
     * Get all
     *
     * @param $params
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function all($params)
    {
        $this->resetModel();
        $this->method('orderBy', 'updated_at', 'DESC');

        return parent::all($params);
    }

    /**
     * Update
     *
     * @param  $params
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function update($params)
    {
        $this->resetModel();
        $this->mask($params);

        return parent::update($params);
    }

    /**
     * Filter
     *
     * @param $params
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function mask($params)
    {
        if (!empty($params->option('id'))) {
            $this->method('where', 'id', $params->option('id'));
        }

        if (!empty($params->option('post_slug'))) {
            $this->method('where', 'post_slug', $params->option('post_slug'));
        }

        return parent::mask($params);
    }

    /**
     * Filter
     *
     * @param $params
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function filter($params)
    {
        if (!empty($params->get('is_active'))) {
            $this->method('where', 'post_active', $params->get('is_active'));
        }

        if (!empty($params->get('post_slug'))) {
            $this->method('where', 'post_slug', $params->get('post_slug'));
        }

        if (!empty($params->get('with_users'))) {
            $this->method('with', 'user');
        }

        if (!empty($params->get('with_category'))) {
            $this->method('with', 'category');
        }

        if (!empty($params->get('limit'))) {
            $this->method('limit', $params->get('limit'));
        }

        if (!empty($params->get('id'))) {
            $this->method('where', 'id', $params->get('id'));
        }

        if (!empty($params->get('not_post_id'))) {
            $this->method('where', 'id', '!=', $params->get('not_post_id'));
        }

        if (!empty($params->get('category_id'))) {
            $this->method('where', 'category_id', $params->get('category_id'));
        }

        return parent::filter($params);
    }
}
