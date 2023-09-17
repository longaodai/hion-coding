<?php

namespace App\Repositories\Categories;

use App\Models\Categories;
use Illuminate\Support\Collection;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @param Categories $app
     */
    public function model()
    {
        return Categories::class;
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
        return parent::getList($params);
    }

    /**
     * Get all
     *
     * @param  $params
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function all($params)
    {
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
     * Mark
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
    public function filter($params = null)
    {
        if (!empty($params->get('id'))) {
            $this->method('where', 'id', $params->get('id'));
        }

        if (!empty($params->get('not_id'))) {
            $this->method('where', 'id', '!=', $params->get('not_id'));
        }

        if (!empty($params->get('with_posts'))) {
            $this->method('with', 'posts');
        }

        return parent::filter($params);
    }
}
