<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reportes';
    protected $primaryKey = 'id_reporte';

    public $timestamps = false;

    protected $fillable = [
        //
        'id_informacion_publica',
        
        //
        'titulos',
        'licencias',
        'reclamos',
        //
        'arbitrios',
        'multas',
        'otro',
        //
        'usuario_id',
    ];
    
    
    // Relacion con usuario
    public function Sistema()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
}
