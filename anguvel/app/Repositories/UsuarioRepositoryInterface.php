<?php

namespace App\Repositories;

use App\Models\Usuario;

interface UsuarioRepositoryInterface extends BaseRepositoryInterface
{
    // You can define custom methods for the Usuario repository here
    public function findByDni(string $dni): ?Usuario;
}
