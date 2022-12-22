<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveTodoRequest;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todo_api = TodoController::todos();
        return view('dashboard.index')->withTodo($todo_api->status() == 200 ? $todo_api->json() : []);
    }

    public function showTodo($todo)
    {
        $todo_api = TodoController::showTodoItem($todo);
        return view('dashboard.todo')->withItem($todo_api->status() == 200 ? $todo_api->json() : null);
    }

    public function addTodo(SaveTodoRequest $request)
    {
        $request->validated();

        $todo_api = TodoController::addTodo();

        return $todo_api->status() === 200 ? back()->withStatus('success')->withMessage('Todo Added') : back()->withStatus('danger')->withMessage('Could not add Todo Item');
    }

    public function updateTodo(SaveTodoRequest $request, $todo)
    {
        $request->validated();

        $todo_api = TodoController::updateTodo($todo);

        return $todo_api->status() === 200 ? back()->withStatus('success')->withMessage('Todo Updated') : back()->withStatus('danger')->withMessage('Could not update Todo');
    }

    public function deleteTodo($todo)
    {
        $todo_api = TodoController::deleteTodo($todo);

        return $todo_api->status() === 200 ? redirect()->route('home')->withMessage('Todo deleted')->withStatus('success') : back()->withStatus('danger')->withMessage('Could not delete Todo');
    }
}
