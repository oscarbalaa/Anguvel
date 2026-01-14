<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuestos extends Model
{
    use HasFactory;

    protected $table = 'impuestos';
    protected $primaryKey = 'id_impuesto';

    public $timestamps = false;

    protected $fillable = [
        'Monto',
        'Inicio',
        'Fin',
        'Tipo',
        //
        'usuario_id',
    ];


}
