<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\TodoRepositoryInterface;
use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Http\Response;


class ToDoController extends Controller
{
    protected $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository) {
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
        $this->todoRepository->deleteTodo($request->id);
        return response()->json(['status' => 'delete success'],Response::HTTP_OK);
    }



}
