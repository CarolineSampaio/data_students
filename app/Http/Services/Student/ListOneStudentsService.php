<?php

namespace App\Http\Services\Student;

use App\Http\Repositories\StudentRepository;

class ListOneStudentsService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function handle($id)
    {
        return $this->studentRepository->getById($id);
    }
}
