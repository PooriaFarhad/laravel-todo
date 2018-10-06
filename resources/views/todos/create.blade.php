@extends('layouts.master')

@section('content')
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="title">
        <button type="submit">
            Add Todo
        </button>
    </form>
@endsection