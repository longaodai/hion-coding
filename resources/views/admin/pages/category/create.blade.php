@extends('admin.layout.master')

@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="header-title">{{ __('category.lbl_create') }}</h4>
                    </div>
                    <hr>
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_name">{{ __('category.lbl_name') }}
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="name" id="lbl_name" class="form-control"
                                        value="{{ old('name') }}" placeholder="{{ __('category.lbl_name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_icon">{{ __('common.lbl_icon') }}</label>
                                    <input type="text" name="icon" id="lbl_icon" class="form-control"
                                        value="{{ old('icon') }}" placeholder="{{ __('common.lbl_icon') }}">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_tag">{{ __('common.lbl_tag') }}</label>
                                    <input type="text" name="tag" id="lbl_tag" class="form-control"
                                        value="{{ old('tag') }}" placeholder="{{ __('common.lbl_tag') }}">
                                    @error('tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="lbl_description">{{ __('common.lbl_description') }}</label>
                                    <input type="text" name="description" id="lbl_description" class="form-control"
                                        value="{{ old('description') }}"
                                        placeholder="{{ __('common.lbl_description') }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2">
                                        <input id="lbl_active" name="active" type="checkbox"
                                            {{ old('active') == ACTIVE_SHOW ? 'checked' : '' }}
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
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="button-list text-center">
                                    <button type="submit"
                                        class="btn btn-outline-success waves-effect waves-light">{{ __('common.lbl_create') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
