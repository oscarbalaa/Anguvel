<?php

namespace App\Repositories;

use App\Models\Gestion_Tributaria_Pagos;
use App\Repositories\BaseRepository;

class GestionTributariaPagosRepository extends BaseRepository implements GestionTributariaPagosRepositoryInterface
{
    /**
     * @var Gestion_Tributaria_Pagos
     */
    protected $model;

    /**
     * GestionTributariaPagosRepository constructor.
     *
     * @param Gestion_Tributaria_Pagos $model
     */
    public function __construct(Gestion_Tributaria_Pagos $model)
    {
        parent::__construct($model);
    }
}
