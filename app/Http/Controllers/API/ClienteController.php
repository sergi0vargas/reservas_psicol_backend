<?php

namespace App\Http\Controllers\API;

use App\Models\Cliente;
use App\Models\Evento;
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
            'documento' => 'required',//agregar unique
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

    
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if (is_null($cliente)) {
            return $this->sendError('Cliente NO encontrado.');
        }
   
        return $this->sendResponse(new ClienteResource($cliente), 'Cliente Consultado Correctamente.');
    }

    public function update(Request $request, Cliente $cliente)
    {
        $input = $request->all();
        $cliente = Cliente::find($input['documento']);
        $cliente->documento = $input['documento'];
        $cliente->nombre = $input['nombre'];
        $cliente->correo = $input['correo'];
        $cliente->telefono = $input['telefono'];
        $cliente->direccion = $input['direccion'];
        try{
            $cliente->save();
         }
         catch(\Exception $e){
            // do task when error
            return("Error ".$e);
         }
        return $this->sendResponse(new ClienteResource($cliente), 'Cliente Actualizado Correctamente.');
    }


    public function vender(Request $request)
    {
        $clienteID = $request->get('c');
        $eventoID = $request->get('e');

        $cliente = Cliente::find($clienteID);
        $evento = Evento::find($eventoID);
        if($evento != null && $cliente != null){
            if($evento->vendidas < $evento->aforo){
                //FALTA EVALUAR CUANTAS ENTRADAS PUEDE COMPRAR UN CLIENTE 
                $evento->vendidas ++;
                $evento->clientes()->attach($cliente->documento);
                $evento->save();
    
                $cliente->fecha_ultima_compra = \Carbon\carbon::now();
                $cliente->evento_id = $evento->id;
                $cliente->save();
                
                \DB::table('cliente_evento')->insert([
                    'cliente_documento' => $cliente->documento,
                    'evento_id' => $evento->id
                ]);

                return $this->sendResponse(new ClienteResource($cliente), 'Boleta Vendida Correctamente.');
            }else{
                return $this->sendResponse(['Aforo'=>$evento->aforo, 'vendidas'=> $evento->vendidas], 'Error al vender Boleta. No hay disponibilidad');  
            }
        }
        return $this->sendResponse(['cliente' => $cliente, 'evento' => $evento], 'No se encontro usuario o evento.');  
    }
   
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
   
        return $this->sendResponse([], 'Cliente Eliminado Correctamente.');   
    }
}
