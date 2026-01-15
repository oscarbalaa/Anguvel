<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_usuario' => $this->id_usuario,
            'dni' => $this->dni,
            'nombre' => $this->nombre,
            // It is generally not recommended to expose passwords directly in API responses.
            // 'contrasena' => $this->contrasena,
        ];
    }
}
