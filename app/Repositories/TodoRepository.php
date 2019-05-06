<?php

namespace App\Repositories;

//use Your Model
use App\Contracts\TodoRepositoryInterface;
use App\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    public function getListTodo()
    {
        return Todo::get();
    }

    public function deleteTodo($id)
    {
        Todo::where('id','=',$id)->delete();
    }

}
