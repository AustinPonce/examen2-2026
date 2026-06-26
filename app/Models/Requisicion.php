<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Requisicion extends Model
{
    protected $table = 'requisiciones';

    protected $primaryKey = 'idRequisicion';
    public $incrementing = true;
    protected $keyType = 'int';

    // Asumiendo que no usamos created_at/updated_at en el diagrama
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'estado',
        'idUsuario',
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'idUsuario');
    }

    public function itemsRequisicion(): HasMany
    {
        return $this->hasMany(ItemRequisicion::class, 'idRequisicion');
    }
}
