@extends('layouts.app')

@section('content')
    <div style="margin-top: 40px; margin-bottom: 40px;">
        <h1>Task List</h1>
        @foreach($tasks as $task)
            <div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
                <div class="card-body">
                    <p>{{ $task->description}}</p>
                    @if(!$task->isCompleted())
                        <form action="/{{ $task->id }}" method="POST">
                            @method('PATCH')
                            @csrf
                            <button class="btn btn-light btn-block" input="submit">Complete</button>
                        </form>
                    @else
                        <form action="/{{ $task->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-block" input="submit">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        <a href="/create" class="btn btn-primary btn-lg btn-block">New Task</a>
    </div>
@endsection
