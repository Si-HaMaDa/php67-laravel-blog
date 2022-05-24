@extends('admin.layout.admin')

@section('title', __('users.user'))

@section('content')
<h2 class="mt-5">@lang('users.user')
    <a class="float-end h6" href="{{ route('admin.users.index') }}">Back to @lang('users.users')</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">{{ __('users.ID') }}</th>
                <th scope="col">{{ __('users.Name') }}</th>
                <th scope="col">{{ __('users.Email') }}</th>
                <th scope="col">{{ __('users.Blogs') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                    {{ $user->blogs->count() }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

@foreach ($user->blogs as $blog)
<p>
    <a href="{{ route('admin.blogs.show', $blog->id) }}">
        {{ $blog->title }}
    </a>
</p>
@endforeach

@endsection
