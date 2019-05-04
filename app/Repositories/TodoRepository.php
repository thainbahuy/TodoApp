<?php

namespace App\Repositories;

//use Your Model
use App\Todo;
use App\Contracts\Repositories\TodoRepositoryInterface;

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
