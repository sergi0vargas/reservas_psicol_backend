<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cliente extends JsonResource
{
    public function toArray($request)
    {
        return [
            'documento' => $this->documento,
            'nombre' => $this->nombre,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'eventos' => $this->eventos,
            'fecha_ultima_compra' => $this->fecha_ultima_compra,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
