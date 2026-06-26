<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'nombre',
    ];

    /**
     * Una Unidad tiene muchos Usuarios que laboran en ella.
     */
    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class);
    }

    /**
     * Una Unidad tiene muchos registros de MaterialUnidad.
     */
    public function materialesUnidad(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class);
    }

    /**
     * Una Unidad tiene muchos Presupuestos.
     */
    public function presupuestos(): HasMany
    {
        return $this->hasMany(Presupuesto::class);
    }
}
