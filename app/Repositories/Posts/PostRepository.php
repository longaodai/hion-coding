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
    public function __construct(Posts $app)
    {
        $this->app = $app;
        
        parent::__construct();
    }

    /**
     * Get list
     *
     * @param  $data
     * @param  $options
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($data = null, $options = null)
    {
        $this->thisModel('orderBy', 'id', 'DESC');
        $this->thisModel('with', 'category');

        return parent::getList($data, $options);
    }

     /**
     * Get all
     *
     * @param  $data
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function all($data = null)
    {
        $this->setModel();
        $this->thisModel('orderBy', 'updated_at', 'DESC');

        return parent::all($data);
    }

    /**
     * Update
     *
     * @param  $params
     * @param  $options
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function update($params = null, $options = null)
    {
        $this->mark($options);
        
        return parent::update($params, $options);
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
    public function mark($params = null)
    {
        if (!empty($params) && !empty($params->get('id'))) {
            $this->thisModel('where', 'id', $params->get('id'));
        }

        return parent::mark($params);
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
    public function filter($params = null)
    {
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

            if (!empty($params->get('id'))) {
                $this->thisModel('where', 'id', $params->get('id'));
            }

            if (!empty($params->get('not_post_id'))) {
                $this->thisModel('where', 'id', '!=', $params->get('not_post_id'));
            }

            if (!empty($params->get('category_id'))) {
                $this->thisModel('where', 'category_id', $params->get('category_id'));
            }
        }

        return parent::filter($params);
    }
}