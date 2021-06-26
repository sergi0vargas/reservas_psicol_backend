<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Evento extends JsonResource
{
    public function toArray($request)
    {
        return [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'aforo' => $this->aforo,
            'vendidas' => $this->vendidas,
            'fecha_evento' => $this->fecha_evento,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
