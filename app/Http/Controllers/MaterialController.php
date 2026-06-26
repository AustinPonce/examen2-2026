<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'unidad_medida' => 'required|string',
            'descripcion'   => 'required|string',
            'ubicacion'      => 'required|string',
            'categoria_id'  => 'required|integer|exists:categorias,id',
        ]);

        $material = Material::create($validated);
        $material->load('categoria');

        return response()->json($material, 201);
    }

    /**
     * PUT http://localhost:8000/api/materiales/{id}
     * Actualizar un material existente.
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $material = Material::findOrFail($id);

        $validated = $request->validate([
            'unidad_medida' => 'sometimes|required|string|max:255',
            'descripcion'   => 'sometimes|required|string|max:255',
            'ubicacion'     => 'sometimes|required|string|max:255',
            'categoria_id'  => 'sometimes|required|integer|exists:categorias,id',
        ]);

        $material->update($validated);
        $material->load('categoria');

        return response()->json($material);
    }
}
