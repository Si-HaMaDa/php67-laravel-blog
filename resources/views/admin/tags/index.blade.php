@extends('admin.layout.admin')

@section('title', __('tags.tags'))

@section('content')

@if (session('success'))

<div class="alert alert-success m-5">
    {{ session('success') }}
</div>

@endif

<h2 class="mt-5">{{ __('tags.tags') }}
    <a class="float-end h6 btn btn-primary btn-sm" href="{{ route('admin.tags.create') }}">
        {{ __('tags.add_tag') }}</a>
</h2>
<div class="table-responsive pt-3 pb-2 mb-3 border-bottom">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">{{ __('tags.ID') }}</th>
                <th scope="col">{{ __('tags.Name') }}</th>
                <th scope="col">{{ __('tags.Action') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($tags as $tag)
            <tr>
                <td>
                    {{ $tag->id }}
                </td>
                <td>
                    {{ $tag->name }}
                </td>
                <td>
                    <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-outline-info btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    {{-- <a href="{{ route('admin.tags.destroy', $tag->id) }}"
                        class="btn btn-danger btn-sm sa-btn-delete">
                        <i class="fa fa-trash"></i>
                    </a> --}}

                    <form class="d-inline" action="{{ route('admin.tags.destroy', $tag->id) }}" method="post">
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
