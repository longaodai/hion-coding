@extends('admin.layout.master')

@section('contents')
    <div class="card-box">
        <div class="table-responsive table-hover">
            <table class="table mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('common.lbl_id') }}</th>
                        <th>{{ __('common.lbl_icon') }}</th>
                        <th>{{ __('category.lbl_name') }}</th>
                        <th>{{ __('common.lbl_tag') }}</th>
                        <th>{{ __('common.lbl_description') }}</th>
                        <th>{{ __('common.lbl_active') }}</th>
                        <th>{{ __('common.lbl_action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{!! $category->icon !!}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->tag }}</td>
                                <td>{{ $category->description }}</td>
                                <td style="padding-left: 35px;">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2" style="line-height: 0px;">
                                        <input type="checkbox" onclick="return false;" style="width: 0; height: 0"
                                            {{ !empty($category->active) && $category->active == ACTIVE_SHOW ? 'checked' : '' }}>
                                        <label for="lbl_active"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                            class="btn btn-outline-warning waves-effect waves-light">{{ __('common.lbl_edit') }}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">{{ __('common.lbl_not_data_available') }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $data->render('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
