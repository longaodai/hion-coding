<?php

namespace App\Http\Controllers\Admin;

use App\Utils\ImageTrait;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Services\Posts\PostServiceInterface;
use App\Services\Categories\CategoryServiceInterface;

class PostController extends Controller
{
    use ImageTrait;

    public $service;

    /**
     * @param PostServiceInterface $service
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function __construct(PostServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Show list
     *
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function index()
    {
        $data = $this->service->getList();

        return view('admin.pages.post.index', compact('data'));
    }

    /**
     * Show form for creating a new.
     *
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function create()
    {
        $categoryService = app(CategoryServiceInterface::class);
        $dataCategory = $categoryService->all();

        return view('admin.pages.post.create', compact('dataCategory'));
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
        try {
            $path = !empty($request->file('image')) ? $this->storeImage($request->file('image'), 'post') : '';
            $data = [
                'post_title' => $request->get('name'),
                'post_slug' => $request->get('slug'),
                'category_id' => $request->get('category_id'),
                'author_id' => 1,
                'post_image' => $path,
                'post_description' => $request->get('description'),
                'post_active' => !empty($request->get('active')) ? ACTIVE_SHOW : NOT_ACTIVE_SHOW,
            ];

            $this->service->store($data);

            return redirect()->back()->with('success', __('common.msg_add_success'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('common.msg_add_failure'));
        }
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
        $data = $this->service->show($id);
        $categoryService = app(CategoryServiceInterface::class);
        $dataCategory = $categoryService->all();

        return view('admin.pages.post.edit', compact('data', 'dataCategory'));
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
        try {
            $path = !empty($request->file('image')) ? $this->updateImage($request->file('image'), $request->get('old_image'), 'post') : '';
            $data = [
                'post_title' => $request->get('name'),
                'post_slug' => $request->get('slug'),
                'category_id' => $request->get('category_id'),
                'author_id' => $request->get('author_id'),
                'post_description' => $request->get('description'),
                'post_active' => !empty($request->get('active')) ? ACTIVE_SHOW : NOT_ACTIVE_SHOW,
            ];

            if (!empty($path)) {
                $data['post_image'] = $path;
            }

            $post = $this->service->update($data, collect(['id' => $id]));

            /**Remove image post old when updated success and has image new */
            if (!empty($path) && $post && file_exists(public_path('storage/' . $request->get('old_image')))) {
                unlink(storage_path('app/' . $request->get('old_image')));
            }

            return redirect()->back()->with('success', __('common.msg_update_success'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('common.msg_update_failure'));
        }
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
