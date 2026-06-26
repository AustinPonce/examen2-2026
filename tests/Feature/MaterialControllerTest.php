<?php

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('MaterialControllerTest', function () {
    test('dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente', function () {
        $categoria = Categoria::create(['nombre' => 'Limpieza']);

        $payload = [
            'unidad_medida' => 'unidades',
            'descripcion'   => 'Escoba de plástico',
            'ubicacion'      => 'Bodega A',
            'categoria_id'  => $categoria->id,
        ];

        $response = $this->postJson('/api/materiales', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'unidad_medida' => 'unidades',
                'descripcion'   => 'Escoba de plástico',
                'ubicacion'      => 'Bodega A',
                'categoria_id'  => $categoria->id,
            ]);

        $this->assertDatabaseHas('materiales', [
            'descripcion'  => 'Escoba de plástico',
            'categoria_id' => $categoria->id,
        ]);
    });
});
