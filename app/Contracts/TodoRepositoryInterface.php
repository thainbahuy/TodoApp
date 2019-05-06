<?php


namespace App\Contracts;


interface TodoRepositoryInterface
{
    public function getListTodo();

    public function deleteTodo($id);
}
