@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" placeholder="What are you going to do?">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">
                            Add Todo
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-5">
                <a class="btn btn-primary" href="{{ route('todos.create') }}">Create Todo</a>
                <a class="btn btn-primary" href="{{ route('todos.index', ['completed' => 1]) }}">
                    Show Completed Todos
                </a>
                <a class="btn btn-primary" href="{{ route('todos.index') }}">
                    Show All Todos
                </a>
            </div>
            <div class="col-sm-7">
                <form action="{{ route('todos.index') }}">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{ Request::get('q') }}" name="q"
                                       placeholder="What are you looking for?">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @if(session('msg'))
            <div class="alert alert-info">
                {{ session('msg') }}
            </div>
        @endif
        @foreach($todos as $todo)
            <h2 class="border">{{ $todo->title }}</h2>
            <form action="{{ route('todos.destroy', [$todo->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>
            <form action="{{ route('todos.toggle', [$todo->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">
                    @if($todo->is_completed)
                        <i class="fas fa-redo"></i>
                    @else
                        <i class="fas fa-check"></i>
                    @endif
                </button>
            </form>
        @endforeach
        {{ $todos->links() }}
    </div>
@endsection