<?php

namespace App\Http\Services\Student;

use App\Http\Repositories\StudentRepository;

class UpdateOneStudentService
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function handle($id, $data)
    {
        $student = $this->studentRepository->getById($id);
        if (!$student) {
            return ['message' => 'Aluno não encontrado'];
        }

        return $this->studentRepository->update($student, $data);
    }
}
