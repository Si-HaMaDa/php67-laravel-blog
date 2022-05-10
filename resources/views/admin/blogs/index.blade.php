@extends('admin.layout.admin')

@section('title', 'Blogs')

@section('content')
<h2 class="mt-5">Blogs
    <a class="float-end h6 btn btn-primary btn-sm" href="/admin/blogs/add-blog.php">Add Blog</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
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
                    <img width="200" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt=""
                        srcset="https://dummyimage.com/700x350/dee2e6/6c757d.jpg">
                </td>
                <td>
                    <a href="{{ route('admin.blogs.show', $blog->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="/admin/blogs/edit-blog.php?id={{ $blog->id }}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="{{ route('admin.blogs.delete', $blog->id) }}"
                        class="btn btn-danger btn-sm sa-btn-delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>

@endsection