<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;

use App\Http\Services\Student\CreateStudentService;
use App\Http\Services\Student\ListAllStudentsService;
use App\Http\Services\Student\ListOneStudentsService;

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

    public function show(ListOneStudentsService $listOneStudentsService, $id)
    {
        $student = $listOneStudentsService->handle($id);
        return response()->json($student, Response::HTTP_OK);
    }
}
