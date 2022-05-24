@extends('admin.layout.admin')

@section('title', 'Create Blog')

@section('content')

@if ($errors->all())
<div class="alert alert-danger m-5">
    @foreach ($errors->all() as $error)
    <p>
        {{ $error }}
    </p>
    @endforeach
</div>
@endif

<h2 class="mt-5">Blogs
    <a class="float-end h6" href="{{ route('admin.blogs.index') }}">Back to Blogs</a>
</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blogs.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <label for="inputTitle4" class="form-label">Title</label>
                <input type="text" class="form-control" id="inputTitle4" name="title" value="{{ old('title') }}">
            </div>
            <div class="col-md-12">
                <label for="inputContent4" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="inputContent4" cols="30"
                    rows="10">{{ old('content') }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="inputImage4" class="form-label">Image</label>
                <input type="file" class="form-control" id="inputImage4" name="image" value="{{ old('image') }}">
            </div>
            <div class="col-md-6">
                <label for="inputUserID4" class="form-label">UserID</label>
                <select class="form-control" name="user_id" id="user_id">
                    <option value="">Select user</option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputUserID4" class="form-label">Tags: </label>
                <br>
                @foreach ($tags as $tag)
                <label for="{{ $tag->name }}" class="form-label">{{ $tag->name }}</label>
                <input type="checkbox" name="tags[]" id="{{ $tag->name }}" value="{{ $tag->id }}">
                @endforeach
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit Blog</button>
            </div>
        </form>
    </div>
</div>

@endsection
