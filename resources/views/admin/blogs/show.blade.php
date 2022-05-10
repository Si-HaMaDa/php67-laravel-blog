@extends('admin.layout.admin')

@section('title', 'Show Blog')

@section('content')
<h2 class="mt-5">Blogs
    <a class="float-end h6" href="{{ route('admin.blogs.index') }}">Back to Blogs</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">User ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{ $blog['id'] }}
                </td>
                <td>
                    {{ $blog['title'] }}
                </td>
                <td>
                    {{ $blog['content'] }}
                </td>
                <td>
                    {{ $blog['image'] }}
                </td>
                <td>
                    {{ $blog['user_id'] }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
