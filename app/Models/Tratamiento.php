<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Casts\MoneyCast;

class Tratamiento extends Model
{
    use HasFactory;

    protected $cast = [
        'precio' => MoneyCast::class,
    ];

    public function pacientes(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }
}
