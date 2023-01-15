<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Services\Categories\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $categoryService;

    /**
     * @param CategoryServiceInterface $categoryService
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Show list category
     *
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function index()
    {
        $data = $this->categoryService->getList();
        
        return view('admin.pages.category.index', compact('data'));
    }

    /**
     * Show form for creating a new category.
     *
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function create()
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store category
     *
     * @param StoreRequest $request
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function store(StoreRequest $request)
    {
        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('name'),
            'tag' => $request->get('tag'),
            'icon' => $request->get('icon'),
            'description' => $request->get('description'),
            'active' => !empty($request->get('active')) ? ACTIVE_SHOW : NOT_ACTIVE_SHOW,
        ];
        
        $this->categoryService->store($data);

        return redirect()->back()->with('success', __('common.msg_add_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function edit($id)
    {
        $data = $this->categoryService->show($id);

        return view('admin.pages.category.edit', compact('data'));
    }

    /**
     * Update category
     *
     * @param UpdateRequest $request
     * @param [type] $id
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
            'slug' => $request->get('name'),
            'tag' => $request->get('tag'),
            'icon' => $request->get('icon'),
            'description' => $request->get('description'),
            'active' => !empty($request->get('active')) ? ACTIVE_SHOW : NOT_ACTIVE_SHOW,
        ];
        $category = $this->categoryService->update($data, collect(['id' => $id]));

        return redirect()->back()->with('success', __('common.msg_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
