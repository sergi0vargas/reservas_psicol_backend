<?php

namespace App\Http\Controllers\API;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Cliente as ClienteResource;

class ClienteController extends BaseController
{
    public function index()
    {
        $clientes = Cliente::all();
        return $this->sendResponse(ClienteResource::collection($clientes), 'Clientes Listados Correctamente.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'documento' => 'required|',//agregar unique
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Error de Validacion.', $validator->errors());       
        }

        $cliente = Cliente::create($input);
        return $this->sendResponse(new ClienteResource($cliente), 'Cliente Creado Correctamente.');
    }

    
    public function show($documento)
    {
        $cliente = Cliente::find($documento);
  
        if (is_null($cliente)) {
            return $this->sendError('Evento NO encontrado.');
        }
   
        return $this->sendResponse(new ClienteResource($evento), 'Cliente Consultado Correctamente.');
    }

    public function update(Request $request, Cliente $cliente)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'documento' => 'required|',//agregar unique
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Error de Validacion.', $validator->errors());       
        }
        
        $cliente->documento = $input['documento'];
        $cliente->nombre = $input['nombre'];
        $cliente->correo = $input['correo'];
        $cliente->telefono = $input['telefono'];
        $cliente->direccion = $input['direccion'];
        $evento->save();

        return $this->sendResponse(new ClienteResource($cliente), 'Cliente Actualizado Correctamente.');
    }

   
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
   
        return $this->sendResponse([], 'Cliente Eliminado Correctamente.');   
    }
}
