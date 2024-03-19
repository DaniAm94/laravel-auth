@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1 class="text-center">Projects</h1>

        {{-- Filtro --}}
        <form action="{{ route('admin.projects.index') }}" method="GET">
            <div class="input-group">
                <select name="filter" class="form-select">
                    <option>Tutti</option>
                    <option @if ($filter === 'completed') selected @endif value="completed">Completati</option>
                    <option @if ($filter === 'work in progress') selected @endif value="work in progress">In corso</option>
                </select>
                <button class="btn btn-outline-secondary" type="submit">Filtra</button>
            </div>
        </form>

    </header>
    <table class="table table-info table-striped table-hover mt-3 rounded">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Stato</th>
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
                    <td>{{ $project->is_completed ? 'Completato' : 'In corso' }}</td>
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
    {{-- Pagination --}}
    {{ $projects->links() }}
    {{-- Delete Modal --}}
    @include('includes.modal_confirmation_delete')
@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
