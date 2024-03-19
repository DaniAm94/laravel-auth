@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header>
        <h1 class="text-center">Projects</h1>
    </header>
    <table class="table table-info table-striped table-hover mt-3 rounded">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Data creazione</th>
                <th scope="col">Ultima modifica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->slug }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-2 ">
                            <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-pencil"></i>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="post"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="far fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <h3>Non ci sono progetti al momento</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- Delete Modal --}}
    @include('includes.modal_confirmation_delete')
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
