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
    public function __construct(Categories $app)
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
        return parent::getList();
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
     * Mark
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
            if (!empty($params->get('id'))) {
                $this->thisModel('where', 'id', $params->get('id'));
            }

            if (!empty($params->get('not_id'))) {
                $this->thisModel('where', 'id', '!=', $params->get('not_id'));
            }
        }

        return parent::filter($params);
    }
}