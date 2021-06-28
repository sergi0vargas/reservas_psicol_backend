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

    public function update(Request $request,Evento $eventoActualizado)
    {
        $evento = Evento::find($request->get('id'));
        $evento->titulo = $request->get('titulo');
        $evento->descripcion = $request->get('descripcion');
        $evento->aforo = $request->get('aforo');
        $evento->vendidas = $request->get('vendidas');
        try{
            $evento->save();
         }
         catch(\Exception $e){
            // do task when error
            return("Error ".$e);
         }

        return $this->sendResponse(new EventoResource($evento), 'Evento Actualizado Correctamente.');
    }

   
    public function destroy(Evento $evento)
    {
        $evento->delete();
   
        return $this->sendResponse([], 'Evento Eliminado Correctamente.');   
    }
}
