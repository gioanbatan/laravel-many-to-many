@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-3">{{ $project->title }}</h1>

        <h4 class="text-center text-secondary mt-3">Tipologia:
            {{ $project->type ? $project->type->name : 'Nessuna categoria' }}</h4>

        <h5 class="text-center my-3">Data creazione: {{ $project->created_at }}</h5>


        @if ($project->cover_image)
            <div class="image-preview mx-auto w-75">
                <img src="{{ asset('storage/' . $project->cover_image) }}" alt={{ "Immagine di $project->cover_image" }}>
            </div>
        @endif

        @if ($project->description)
            <h4 class="my-3">Descrizione del progetto</h4>

            <p class="mt-3">{{ $project->description }}</p>
        @endif
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary ms_squared-2 rounded-circle">
            <i class="fa-solid fa-left-long"></i>
        </a>
    </div>
@endsection
