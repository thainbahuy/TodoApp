<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Repositories\TodoRepository;

class ToDoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepository $todoRepository) {
        $this->todoRepository = $todoRepository;
    }
    
    public function index()
    {
        return view('Homepage');
    }

    public function getList()
    {
        $todos = $this->todoRepository->getListTodo();
        return response()->json([
            'todo' => $todos
        ]);
    }

    public function deleteTodo(Request $request){
        
    }



}
