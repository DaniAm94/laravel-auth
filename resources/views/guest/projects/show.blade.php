@extends('layouts.app')

@section('title', 'Project')

@section('content')
    <div class="card my-5">
        <div class="card-header d-flex justify-content-between align-items-center ">
            {{ $project->title }}
            <a href="" class="btn btn-sm btn-primary ">Vedi</a>
        </div>
        <div class="card-body">
            <div class="row">
                @if ($project->image)
                    <div class="col-3">
                        <img class="img-fluid" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    </div>
                @endif
                <div class="col">
                    <h5 class="card-title mb-4 ">{{ $project->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $project->getFormattedDate('created_at') }}</h6>
                    <p class="card-text">{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
