@extends('admin.layout.admin')

@section('title', __('tags.tag'))

@section('content')
<h2 class="mt-5">@lang('tags.tag')
    <a class="float-end h6" href="{{ route('admin.tags.index') }}">Back to @lang('tags.tags')</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">{{ __('tags.ID') }}</th>
                <th scope="col">{{ __('tags.Name') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $tag->id }}
                </td>
                <td>
                    {{ $tag->name }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
