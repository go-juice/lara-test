@extends('layout')

@section('content')
    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/projects">
    {{ csrf_field() }}
        <div class="field">
            <label class="label" for="title">Project Title</label>
            <div class="control">
                <input type="text" class="input" {{ $errors->has('title') ? 'is-danger' : '' }}name="title" required value="{{ old('title') }}">
            </div>
        </div>
        <div class="field">
            <label for="description" class="label">Project Description</label>
            <div>
                <textarea name="description" class="textarea" required {{ $errors->has('description') ? 'is-danger' : '' }} value="{{ old('title') }}"></textarea>
            </div>
        </div>
        <div class="field">
            <button type="submit" class="button is-link">Create Project</button>
        </div>

        @include('errors')

    </form>
@endsection
