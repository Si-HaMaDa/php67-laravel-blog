@extends('admin.layout.admin')

@section('title', __('users.add_user'))

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

<h2 class="mt-5">@lang('users.users')
    <a class="float-end h6" href="{{ route('admin.users.index') }}">Back to {{ __('users.users') }}</a>
</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="post" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="inputTitle4" class="form-label">{{ __('users.name') }}</label>
                <input type="text" class="form-control" id="inputTitle4" name="name" value="{{ old('name') }}">
            </div>
            <div class="col-md-6">
                <label for="inputTitle5" class="form-label">{{ __('users.email') }}</label>
                <input type="text" class="form-control" id="inputTitle5" name="email" value="{{ old('email') }}">
            </div>
            <div class="col-md-6">
                <label for="inputTitle6" class="form-label">{{ __('users.password') }}</label>
                <input type="password" class="form-control" id="inputTitle6" name="password"
                    value="{{ old('password') }}">
            </div>
            <div class="col-md-6">
                <label for="inputTitle6" class="form-label">{{ __('users.password_confirmation') }}</label>
                <input type="password" class="form-control" id="inputTitle6" name="password_confirmation"
                    value="{{ old('password_confirmation') }}">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit @lang('users.user')</button>
            </div>
        </form>
    </div>
</div>

@endsection
