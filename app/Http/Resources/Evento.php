<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Evento extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'aforo' => $this->aforo,
            'vendidas' => $this->vendidas,
            'clientes' => $this->clientes,
            'fecha_evento' => $this->fecha_evento,
            'clientes' => $this->clientes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
