<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Http\Services\Student\CreateStudentService;
use App\Http\Services\Student\DeleteOneStudentService;
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

    /**
     * @OA\Post(
     *     path="/api/alunos",
     *     operationId="createStudent",
     *     tags={"Alunos"},
     *     summary="Cadastra um novo aluno",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="nome", type="string", example="João Silva"),
     *             @OA\Property(property="idade", type="integer", example=20),
     *             @OA\Property(property="nota_primeiro_semestre", type="number", format="float", example=8.5),
     *             @OA\Property(property="nota_segundo_semestre", type="number", format="float", example=7.9),
     *             @OA\Property(property="nome_professor", type="string", example="Professor A"),
     *             @OA\Property(property="numero_sala", type="integer", example=101)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Cadastro realizado com sucesso",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="nome", type="string", example="João Silva"),
     *             @OA\Property(property="idade", type="integer", example=20),
     *             @OA\Property(property="nota_primeiro_semestre", type="number", format="float", example=8.5),
     *             @OA\Property(property="nota_segundo_semestre", type="number", format="float", example=7.9),
     *             @OA\Property(property="nome_professor", type="string", example="Professor A"),
     *             @OA\Property(property="numero_sala", type="integer", example=101),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2024-08-21T18:20:07.000000Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2024-08-21T18:20:07.000000Z")
     *         )
     *     ),
     *     @OA\Response(response=400, description="Dados inválidos"),
     *     @OA\Response(response=500, description="Erro interno no servidor")
     * )
     */
    public function store(StoreStudentRequest $request, CreateStudentService $createStudentService)
    {
        $data = $request->all();
        $student = $createStudentService->handle($data);
        return response()->json($student, Response::HTTP_CREATED);
    }


    /**
     * @OA\Get(
     *     path="/api/alunos",
     *     operationId="listStudents",
     *     tags={"Alunos"},
     *     summary="Lista todos os alunos",
     *     @OA\Response(
     *         response=200,
     *         description="Listagem realizada com sucesso",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="nome", type="string", example="João Silva"),
     *                 @OA\Property(property="idade", type="integer", example=20),
     *                 @OA\Property(property="nota_primeiro_semestre", type="number", format="float", example=8.5),
     *                 @OA\Property(property="nota_segundo_semestre", type="number", format="float", example=7.9),
     *                 @OA\Property(property="nome_professor", type="string", example="Professor A"),
     *                 @OA\Property(property="numero_sala", type="integer", example=101),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2024-08-21T18:20:07.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2024-08-21T18:20:07.000000Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=500, description="Erro interno no servidor")
     * )
     */
    public function index()
    {
        $alunos = $this->listAllStudentsService->handle();
        return response()->json($alunos, Response::HTTP_OK);
    }

    public function show(ListOneStudentService $listOneStudentService, $id)
    {
        $student = $listOneStudentService->handle($id);
        if (isset($student['message'])) {
            return response()->json($student, Response::HTTP_NOT_FOUND);
        }
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

    public function destroy(DeleteOneStudentService $deleteOneStudentService, $id)
    {
        $student = $deleteOneStudentService->handle($id);
        if (isset($student['message'])) {
            return response()->json($student, Response::HTTP_NOT_FOUND);
        }

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
