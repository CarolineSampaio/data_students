<?php

namespace App\Interfaces;

use App\Models\Student;

interface StudentRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function getById($id);
    public function update(Student $student, array $data);
}
