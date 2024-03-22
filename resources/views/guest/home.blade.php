@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <header>
        <h1>BoolFolio</h1>
        <h3>I progetti completati</h3>
        {{-- Pagination --}}
        {{ $projects->links() }}
    </header>
    <hr>
    @forelse ($projects as $project)
        <div class="card my-5">
            <div class="card-header d-flex justify-content-between align-items-center ">
                {{ $project->title }}
                <a href="{{ route('guest.projects.show', $project->slug) }}" class="btn btn-sm btn-primary ">Vedi</a>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($project->image)
                        <div class="col-3">
                            <img class="img-fluid" src="{{ $project->printImage() }}" alt="{{ $project->title }}">
                        </div>
                    @endif
                    <div class="col">
                        <h5 class="card-title mb-4 ">{{ $project->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->getFormattedDate('created_at') }}
                        </h6>
                        <p class="card-text">{{ $project->getAbstract(100) }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h3 class="text-center">Non ci sono progetti</h3>
    @endforelse
    {{-- Pagination --}}
    {{ $projects->links() }}
@endsection
