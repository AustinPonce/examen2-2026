<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaterialUnidad extends Model
{
    protected $table = 'material_unidad';

    protected $fillable = [
        'cantidad',
        'material_id',
        'unidad_id',
        'presupuesto_id',
    ];

    /**
     * Un MaterialUnidad pertenece a un Material.
     */
    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * Un MaterialUnidad pertenece a una Unidad.
     */
    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class);
    }

    /**
     * Un MaterialUnidad fue comprado con un Presupuesto (opcional).
     */
    public function presupuesto(): BelongsTo
    {
        return $this->belongsTo(Presupuesto::class);
    }
}
