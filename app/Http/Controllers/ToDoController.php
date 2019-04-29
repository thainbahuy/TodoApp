<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class ToDoController extends Controller
{
    public function getList()
    {
        $todos = Todo::get();
        return response()->json([
            'todo' => $todos
        ]);
    }
}
