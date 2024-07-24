@extends('layouts.app')

@section('content')

    <div class="container pt-3">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-center">{{ $project->title }}</h1>
        <p class="text-center">{{ $project->description }}</p>
        <p>{{ $project->in_progress }}</p>
        <p>Tipo: {{ $project->type?->name ?: 'non definito' }}</p>

    </div>
    
@endsection