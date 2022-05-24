@extends('admin.layout.admin')

@section('title', __('tags.add_tag'))

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

<h2 class="mt-5">@lang('tags.tags')
    <a class="float-end h6" href="{{ route('admin.tags.index') }}">Back to {{ __('tags.tags') }}</a>
</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.tags.store') }}" method="post" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="inputTitle4" class="form-label">{{ __('tags.name') }}</label>
                <input type="text" class="form-control" id="inputTitle4" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit @lang('tags.tag')</button>
            </div>
        </form>
    </div>
</div>

@endsection
