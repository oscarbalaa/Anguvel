<?php

namespace App\Repositories;

use App\Models\Usuario;
use App\Repositories\BaseRepository;

class UsuarioRepository extends BaseRepository implements UsuarioRepositoryInterface
{
    /**
     * @var Usuario
     */
    protected $model;

    /**
     * UsuarioRepository constructor.
     *
     * @param Usuario $model
     */
    public function __construct(Usuario $model)
    {
        parent::__construct($model);
    }

    public function findByDni(string $dni): ?Usuario
    {
        return $this->model->where('dni', $dni)->first();
    }
}
