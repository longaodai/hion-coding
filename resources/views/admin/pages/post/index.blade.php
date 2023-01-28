@extends('admin.layout.master')

@section('contents')
    <div class="card-box">
        <div class="table-responsive table-hover">
            <table class="table mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>{{ __('common.lbl_id') }}</th>
                        <th>{{ __('post.lbl_name') }}</th>
                        <th>{{ __('category.lbl_name') }}</th>
                        <th>{{ __('common.lbl_image') }}</th>
                        <th>{{ __('common.lbl_active') }}</th>
                        <th>{{ __('common.lbl_action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count() > 0)
                        @foreach ($data as $post)
                            <tr>
                                <th>{{ !empty($post->id) ? $post->id : '' }}</th>
                                <td>{{ !empty($post->post_title) ? $post->post_title : '' }}</td>
                                <td>{{ !empty($post->category) ? $post->category->name : '' }}</td>
                                <td><img src="{{ asset(getPathImage(!empty($post->post_image) ? $post->post_image : '')) }}"
                                        alt="{{ !empty($post->post_title) ? $post->post_title : '' }}" style="width: 50px"></td>
                                <td style="padding-left: 35px;">
                                    <div class="checkbox checkbox-success checkbox-circle mb-2" style="line-height: 0px;">
                                        <input type="checkbox" onclick="return false;" style="width: 0; height: 0"
                                            {{ !empty($post->post_active) && $post->post_active == ACTIVE_SHOW ? 'checked' : '' }}>
                                        <label for="lbl_active"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="button-list">
                                        <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                                            class="btn btn-outline-warning waves-effect waves-light">{{ __('common.lbl_edit') }}</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center">{{ __('common.lbl_not_data_available') }}</td>
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
