<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'documento',
        'nombre',
        'correo',
        'telefono',
        'direccion',
        'fecha_ultima_compra',
    ];

    public function eventos(){
        return $this->hasMany('App\Models\Evento');
    }
}
