<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    // https://todoapp-api-service.herokuapp.com
    const API_URL = "http://localhost:5000";
    const API_AUTH_URL = self::API_URL . "/auth";
    const API_TODO_URL = self::API_URL . "/todo";

    public static function authenticateUser()
    {
        return Http::post(self::API_AUTH_URL, [
            "user" => request('email')
        ]);
    }

    public static function todos()
    {
        return self::todoRequest()->get(self::API_TODO_URL);
    }

    public static function addTodo()
    {
        return self::todoRequest()->post(self::API_TODO_URL . "/new", request()->all());
    }

    public static function showTodoItem($id)
    {
        return self::todoRequest()->get(self::API_TODO_URL . "/$id");
    }

    public static function updateTodo($id)
    {
        return self::todoRequest()->put(self::API_TODO_URL . "/update/$id", request()->all());
    }

    public static function deleteTodo($id)
    {
        return self::todoRequest()->delete(self::API_TODO_URL . "/delete/$id");
    }

    public static function todoRequest()
    {
        return Http::withHeaders(['Bearer' => session('jwt-token')]);
    }
}
