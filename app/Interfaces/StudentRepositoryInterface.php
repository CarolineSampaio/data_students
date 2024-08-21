<?php

namespace App\Interfaces;

interface StudentRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function getById($id);
}
