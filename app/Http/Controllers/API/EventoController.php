<?php

namespace App\Http\Controllers\API;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Evento as EventoResource;

class EventoController extends BaseController
{
    
    public function index()
    {
        $eventos = Evento::all();
        return $this->sendResponse(EventoResource::collection($eventos), 'Eventos Listados Correctamente.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required',
            'aforo' => 'required',
            'vendidas' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Error de Validacion.', $validator->errors());       
        }

        $evento = Evento::create($input);
        return $this->sendResponse(new EventoResource($evento), 'Evento Creado Correctamente.');
    }

    
    public function show($id)
    {
        $evento = Evento::find($id);
  
        if (is_null($evento)) {
            return $this->sendError('Evento NO encontrado.');
        }
   
        return $this->sendResponse(new EventoResource($evento), 'Evento Consultado Correctamente.');
    }

    public function update(Request $request, Evento $evento)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_evento' => 'required',
            'aforo' => 'required',
            'vendidas' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Error de Validacion.', $validator->errors());       
        }
        
        $evento->titulo = $input['titulo'];
        $evento->descripcion = $input['descripcion'];
        $evento->fecha_evento = $input['fecha_evento'];
        $evento->aforo = $input['aforo'];
        $evento->vendidas = $input['vendidas'];
        $evento->save();

        return $this->sendResponse(new EventoResource($evento), 'Evento Actualizado Correctamente.');
    }

   
    public function destroy(Evento $evento)
    {
        $evento->delete();
   
        return $this->sendResponse([], 'Evento Eliminado Correctamente.');   
    }
}
