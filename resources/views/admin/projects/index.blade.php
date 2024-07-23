@extends('layouts.app')

@section('content')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif

        <h1 class="text-center">All Projects</h1>
        <a class="btn btn-primary" href="{{ route('admin.projects.create') }}" as="button">Crea nuovo progetto</a>
        <ul>
            @foreach ($projects as $project)
                <li>
                    <a href="{{ route('admin.projects.show', $project) }}">{{ $project['title'] }}</a>
                    <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project) }}" as="button">Modifica</a>
                </li>
            @endforeach
        </ul>

    </div>
    
@endsection