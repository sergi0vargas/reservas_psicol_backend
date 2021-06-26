<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    
    public function index()
    {
        return Evento::all();
    }

    public function store(Request $request)
    {
        $evento = new Evento();
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->aforo = $request->aforo;
        $evento->vendidas = $request->vendidas;
        $evento->save();
        return $evento;
    }

    
    public function show(Evento $evento)
    {
        return Evento::findOrFail($request->id);
    }

    public function update(Request $request)
    {
        $evento = Evento::findOrFail($request->id);
        $evento->titulo = $request->titulo;
        $evento->descripcion = $request->descripcion;
        $evento->fecha_evento = $request->fecha_evento;
        $evento->aforo = $request->aforo;
        $evento->vendidas = $request->vendidas;
        $evento->save();
        return $evento;
    }

   
    public function destroy(Evento $evento)
    {
        return Evento::destroy($request->id);        
    }
}
