<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Http\Services\Student\CreateStudentService;
use App\Http\Services\Student\ListAllStudentsService;
use App\Http\Services\Student\ListOneStudentService;
use App\Http\Services\Student\UpdateOneStudentService;

use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    protected $listAllStudentsService;

    public function __construct(ListAllStudentsService $listAllStudentsService)
    {
        $this->listAllStudentsService = $listAllStudentsService;
    }

    public function store(StoreStudentRequest $request, CreateStudentService $createStudentService)
    {
        $data = $request->all();
        $student = $createStudentService->handle($data);
        return response()->json($student, Response::HTTP_CREATED);
    }

    public function index()
    {
        $alunos = $this->listAllStudentsService->handle();
        return response()->json($alunos, Response::HTTP_OK);
    }

    public function show(ListOneStudentService $listOneStudentService, $id)
    {
        $student = $listOneStudentService->handle($id);
        return response()->json($student, Response::HTTP_OK);
    }

    public function update(UpdateStudentRequest $request, UpdateOneStudentService $updateOneStudentService, $id)
    {
        $data = $request->all();
        $student = $updateOneStudentService->handle($id, $data);
        if (isset($student['message'])) {
            return response()->json($student, Response::HTTP_NOT_FOUND);
        }

        return response()->json($student, Response::HTTP_OK);
    }
}
