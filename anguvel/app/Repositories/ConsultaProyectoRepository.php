<?php

namespace App\Repositories;

use App\Models\Consulta_Proyecto;
use App\Repositories\BaseRepository;

class ConsultaProyectoRepository extends BaseRepository implements ConsultaProyectoRepositoryInterface
{
    /**
     * @var Consulta_Proyecto
     */
    protected $model;

    /**
     * ConsultaProyectoRepository constructor.
     *
     * @param Consulta_Proyecto $model
     */
    public function __construct(Consulta_Proyecto $model)
    {
        parent::__construct($model);
    }
}
