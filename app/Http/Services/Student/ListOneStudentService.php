<?php

namespace App\Http\Services\Student;

use App\Http\Repositories\StudentRepository;

class ListOneStudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function handle($id)
    {
        $student = $this->studentRepository->getById($id);
        if (!$student) {
            return ['message' => 'Aluno não encontrado'];
        }
        return $student;
    }
}
