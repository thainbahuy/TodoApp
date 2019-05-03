<?php

namespace App\Contracts\Repositories;

interface TodoRepositoryInterface
{
    public function getListTodo();
    public function deleteTodo($id);
}
