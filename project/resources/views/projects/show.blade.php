@extends('layout')

@section('content')

    <h1 class="title">{{ $project->title}}</h1>

    <div class="content">
        {{ $project->description }}
        <p>
            <a href="/projects/{{ $project->id }}/edit">Edit</a>
        </p>
    </div>

    @if ($project->tasks->count())
        <div class="box">
            @foreach ($project->tasks as $task)
            <div>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @method('PATCH')
                    @csrf
                    <label for="completed" class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
                        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description}}
                    </label>
                </form>
            </div>
            @endforeach
        </div>
    @endif

    {{-- add a new task form --}}
    <form class="box" method="POST" action="/projects/{{ $project->id }}/tasks">
        @csrf
        <div class="field">
            <label class="label" for="description">New Task</label>
            <div class="control">

                <input type="text" class="input" name="description" placeholder="New Task" required>

            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>
    @include('errors')


@endsection
