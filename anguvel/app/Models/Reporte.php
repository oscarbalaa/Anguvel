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
        'nacimiento',
        'defuncion',
        'matrimonios',
        'usuario_id',
        //
        'impuestos',
        'arbitrios',
        //
        'titulos',
        'licencias',
        //
        'multas',
        'otro',
    ];
    
    
    // Relacion con usuario
    public function Sistema()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
    
    // Relacion con impuesto
    public function Impuestos()
    {
        return $this->hasMany(Impuesto::class, 'id_sistema');
    }
}
