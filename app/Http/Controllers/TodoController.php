<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class TodoController extends Controller
{
    // * This is the end point to our microservice API hosted on a node server which connects to our database to perform CRUD operations.
    public const API_URL = "https://taxaide-node-server.fly.dev";
    public const API_AUTH_URL = self::API_URL . "/auth";
    public const API_TODO_URL = self::API_URL . "/todo";

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
