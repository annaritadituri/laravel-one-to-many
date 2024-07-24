@extends('layouts.app')

@section('content')

    <div class="container">

    <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control @if ($errors->get('title')) is-invalid @endif"
                    id="title"
                    name="title"
                >
                @if ($errors->get('title'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('title') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control @if ($errors->get('description')) is-invalid @endif"
                    id="description"
                    rows="3"
                    name="description"
                ></textarea>
                @if ($errors->get('description'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('description') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start date</label>
                <input
                    type="date"
                    class="form-control @if ($errors->get('start_date')) is-invalid @endif"
                    id="start_date"
                    name="start_date"
                >
                @if ($errors->get('start_date'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('start_date') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <span>In Progress</span>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="in_progress" id="flexRadioDefault1" value="1">
                <label class="form-check-label" for="flexRadioDefault1">
                    SI
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="in_progress" id="flexRadioDefault2" value="0">
                <label class="form-check-label" for="flexRadioDefault2">
                    NO
                </label>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" aria-label="Default select example" name="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mb-3 d-block">CREA</button>
        </form>

    </div>
    
@endsection