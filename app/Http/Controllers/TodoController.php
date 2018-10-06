<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Repositories\Eloquent\TodoRepository;
use App\Repositories\Models\Todo;
use App\Repositories\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request, TodoRepository $todoRepository)
    {
        $todos = $todoRepository->getTodos($request->get('completed'), $request->get('q'));
        return view('todos.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {
        $todo = new Todo;
        $todo->title = $request->get('title');
        $todo->user_id = \Auth::id();
        $todo->save();

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorize('delete', $todo);
        return back();
    }

    public function toggle($id)
    {
        $todo = Todo::findOrFail($id);
        $this->authorize('update', $todo);

        $todo->is_completed = ! $todo->is_completed;
        $todo->save();

        return back()->with('msg', __('msg.todo-updated'));
    }
}
