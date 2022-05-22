@extends('admin.layout.admin')

@section('title', 'Blogs')

@section('content')

@if (session('success'))

<div class="alert alert-success m-5">
    {{ session('success') }}
</div>

@endif

<h2 class="mt-5">{{ __('blogs.blogs') }}
    <a class="float-end h6 btn btn-primary btn-sm" href="{{ route('admin.blogs.create') }}">
    {{ __('blogs.add_blog') }}</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">User</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($blogs as $blog)
            <tr>
                <td>
                    {{ $blog->id }}
                </td>
                <td>
                    {{ $blog->title }}
                </td>
                <td>
                    <img width="200" src="{{ url('storage/'.$blog->image) }}" alt="">
                    {{-- <img width="200" src="{{ \Storage::url($blog->image) }}" alt=""> --}}
                </td>
                <td>
                    {{ $blog->user->name }}
                </td>
                <td>
                    <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    {{-- <a href="{{ route('admin.blogs.destroy', $blog->id) }}"
                        class="btn btn-danger btn-sm sa-btn-delete">
                        <i class="fa fa-trash"></i>
                    </a> --}}

                    <form class="d-inline" action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="delete">
                        <button class="btn btn-danger btn-sm sa-btn-delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>

@endsection
