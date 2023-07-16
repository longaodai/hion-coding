@extends('admin.layout.master')

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="header-title">{{ __('post.lbl_edit') }}</h4>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.post.update', ['id' => $data->id]) }}"
                        enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_name">{{ __('post.lbl_name') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="lbl_name" class="form-control"
                                        value="{{ old('name', $data->post_title) }}"
                                        placeholder="{{ __('post.lbl_name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_category">{{ __('category.lbl_name') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="category_id" id="lbl_category" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($dataCategory as $category)
                                            <option
                                                {{ old('category_id', $data->category_id) == $category->id ? 'selected' : '' }}
                                                value="{{ !empty($category->id) ? $category->id : '' }}">
                                                {{ !empty($category->name) ? $category->name : '' }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_image">{{ __('common.lbl_image') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="lbl_image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <img src="{{ asset(getPathImage(!empty($data->post_image) ? $data->post_image : '')) }}"
                                            alt="{{ !empty($data->post_title) ? $data->post_title : __('common.lbl_default_alt') }}"
                                            style="width: 100px">
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_slug">{{ __('post.lbl_slug') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="slug" id="lbl_slug" class="form-control"
                                        value="{{ old('slug', $data->post_slug) }}"
                                        placeholder="{{ __('post.lbl_slug') }}">
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" style="display: flex; align-items: center;">
                                <div class="form-group mb-3">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2">
                                        <input id="lbl_active" name="active" type="checkbox"
                                            {{ old('active', $data->post_active) == ACTIVE_SHOW ? 'checked' : '' }}
                                            value="{{ ACTIVE_SHOW }}">
                                        <label for="lbl_active">{{ __('common.lbl_active') }}
                                            <span class="text-danger">*</span>
                                            @error('active')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="lbl_description">{{ __('common.lbl_description') }}</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control" id="lbl_description">{{ old('description', $data->post_description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-list text-center">
                                    <button type="submit"
                                        class="btn btn-outline-success waves-effect waves-light">{{ __('common.lbl_update') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('lbl_description');
    </script>
@endsection
