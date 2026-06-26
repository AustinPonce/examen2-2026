<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Presupuesto extends Model
{
    /**
     * Tabla asociada.
     *
     * @var string
     */
    protected $table = 'presupuestos';

    /**
     * Clave primaria personalizada.
     *
     * @var string
     */
    protected $primaryKey = 'codigoPresupuesto';

    /**
     * Indica si la clave primaria es autoincrementante.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Tipo del primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Desactivar timestamps si la tabla no tiene created_at/updated_at.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Atributos asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombrePresupuesto',
    ];

    /**
     * Relación: un Presupuesto tiene muchas MaterialUnidad.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materialesUnidades(): HasMany
    {
        return $this->hasMany(MaterialUnidad::class, 'codigoPresupuesto');
    }
}
