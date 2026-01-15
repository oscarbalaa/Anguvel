<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta_Publica extends Model
{
    use HasFactory;

    protected $table = 'consultas_publicas';
    protected $primaryKey = 'id_consulta_publica';
    public $timestamps = false;
    
    protected $fillable = [
        'tipo',
        'documento',
        'correo',
        'foto',
        'video',
        'estadistica',
        'descripcion',
        'fecha',
    ];
}
