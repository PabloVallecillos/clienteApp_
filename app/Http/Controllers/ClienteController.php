<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest; // importada 

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $mensajes = [
                'destroy' => [
                    0 => ['danger', 'No se ha podido crear el cliente.'],
                    1 => ['sucess', 'Cliente borrado con exito.'],
                ],
                'store' => [
                    0 => ['danger', 'No se ha podido agregar el cliente.'],
                    1 => ['sucess', 'Cliente creado con exito.'],
                ],
                'update' => [
                    0 => ['danger', 'No se ha podido editar el cliente.'],
                    1 => ['sucess', 'Cliente editado correctamente.'],
                ],
         ];
         
         $clientes = Cliente::all();
         $op = $request->session()->get('op');
         $result = $request->session()->get('result');
         $error = $request->session()->get('error');
            $datos = [
                'clientes' => $clientes,
            ];
        
              if(isset($result)) {
                  $resultado = [
                                'destroy' => [
                                    0 => ['danger', 'No se ha podido crear el cliente.'], 
                                    1 => ['sucess', 'Cliente borrado con exito.'],
                                ],
                                'store' => [
                                    0 => ['danger', 'No se ha podido agregar el cliente.'],
                                    1 => ['sucess', 'Cliente creado con exito.'],
                                ],
                                'update' => [
                                    0 => ['danger', 'No se ha podido editar el cliente.'],
                                    1 => ['sucess', 'Cliente editado correctamente.'],
                                ],
                              ];
                  $datos += [
                       'tipo'    => $resultado[$op][$result][0], 
                       'mensaje' => $resultado[$op][$result][1],
                   ];
                   
        }
        
        return view('cliente.index')->with($datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $error = '';
        $input = $request->validated(); 
        $cliente = new Cliente($input); 
        
        try {
            $result = $cliente->save();
            if($result){
                return redirect(route('cliente.index'))->with('success', 'Cliente guardado con exito');
            }else{
                return redirect(route('cliente.index'))->with('danger', 'Error al guardar el cliente');
            }
        } catch(\Exception $e) {
            $result = false;
            $error = ['nombre' => 'El nombre utilizado ya existe en otro cliente.'];
            return redirect(route('cliente.create'))->withErrors($error)->withInput();
        }
        
        return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('cliente.show')->with(['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit')->with(['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $input = $request->validated(); 
        try{
            $result = $cliente->update($input);
        }catch(\Exception $e) {
            $result = false;
            $error = ['nombre' => 'El nombre utilizado ya existe en otro cliente.'];
            return redirect('cliente/' . $cliente-> id. '/edit' )->withErrors($error)->withInput();
        }
        return redirect(route('cliente.index'))->with(['result' => $result, 'op' => 'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        try {
            $cliente->delete();
            $result = true;
        } catch(\Exception $e) {
            $result = false;
        }
        return redirect(route('cliente.index'))->with(['result' => $result,'op' => 'destroy']);
    }
}
