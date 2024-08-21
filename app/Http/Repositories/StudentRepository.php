<?php

namespace App\Http\Repositories;

use App\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function create(array $data)
    {
        return Student::create($data);
    }

    public function getAll()
    {
        return Student::all();
    }

    public function getById($id)
    {
        return Student::find($id);
    }

    public function update(Student $student, $data)
    {
        $student->update($data);
        return $student;
    }
}
