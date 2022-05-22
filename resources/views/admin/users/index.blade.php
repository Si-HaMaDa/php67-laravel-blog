@extends('admin.layout.admin')

@section('title', __('users.users'))

@section('content')

@if (session('success'))

<div class="alert alert-success m-5">
    {{ session('success') }}
</div>

@endif

<h2 class="mt-5">{{ __('users.users') }}
    <a class="float-end h6 btn btn-primary btn-sm" href="{{ route('admin.users.create') }}">
        {{ __('users.add_user') }}</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">{{ __('users.ID') }}</th>
                <th scope="col">{{ __('users.Name') }}</th>
                <th scope="col">{{ __('users.Email') }}</th>
                <th scope="col">{{ __('users.Action') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
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
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    {{-- <a href="{{ route('admin.users.destroy', $user->id) }}"
                        class="btn btn-danger btn-sm sa-btn-delete">
                        <i class="fa fa-trash"></i>
                    </a> --}}

                    <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">
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
