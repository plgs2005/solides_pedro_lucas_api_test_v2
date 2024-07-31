<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Record",
 *     type="object",
 *     title="Record",
 *     properties={
 *         @OA\Property(
 *             property="id",
 *             type="integer",
 *             description="ID do registro"
 *         ),
 *         @OA\Property(
 *             property="name",
 *             type="string",
 *             description="Nome do registro"
 *         ),
 *         @OA\Property(
 *             property="description",
 *             type="string",
 *             description="Descrição do registro"
 *         ),
 *         @OA\Property(
 *             property="created_at",
 *             type="string",
 *             format="date-time",
 *             description="Timestamp de criação"
 *         ),
 *         @OA\Property(
 *             property="updated_at",
 *             type="string",
 *             format="date-time",
 *             description="Timestamp da última atualização"
 *         ),
 *     }
 * )
 *
 * @OA\Tag(
 *     name="Records",
 *     description="Endpoints relacionados aos registros"
 * )
 */
class RecordController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/records",
     *     tags={"Records"},
     *     summary="Obter lista de registros",
     *     @OA\Response(
     *         response=200,
     *         description="Operação bem-sucedida",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Record"))
     *     )
     * )
     */
    public function index()
    {
        $records = Record::all();
        return response()->json($records);
    }

    /**
     * @OA\Get(
     *     path="/api/records/{id}",
     *     tags={"Records"},
     *     summary="Obter um registro específico",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operação bem-sucedida",
     *         @OA\JsonContent(ref="#/components/schemas/Record")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registro não encontrado"
     *     )
     * )
     */
    public function show($id)
    {
        $record = Record::find($id);
        if (!$record) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }
        return response()->json($record);
    }

    /**
     * @OA\Post(
     *     path="/api/records",
     *     tags={"Records"},
     *     summary="Criar um novo registro",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Registro criado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Record")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $record = Record::create($request->all());
        return response()->json($record, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/records/{id}",
     *     tags={"Records"},
     *     summary="Atualizar um registro existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Registro atualizado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Record")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registro não encontrado"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $record = Record::find($id);
        if (!$record) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }

        $record->update($request->all());
        return response()->json($record);
    }

    /**
     * @OA\Delete(
     *     path="/api/records/{id}",
     *     tags={"Records"},
     *     summary="Excluir um registro",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Registro excluído com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Registro não encontrado"
     *     )
     * )
     */
    public function destroy($id)
    {
        $record = Record::find($id);
        if (!$record) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }

        $record->delete();
        return response()->json(null, 204);
    }
}
