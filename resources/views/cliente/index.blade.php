@extends('base')

@section('contenido')

@isset($tipo)
    <div class="alert alert-{{$tipo}}" role="alert">
        {{ $mensaje }}
    </div>
@endisset 
    
    <!--  Aqui va el listado   -->
    
    @if(session()->has('mensajeAlert'))
        <div class="alert alert-success" role="alert"> {{ session('mensajeAlert') }} </div>
    @elseif(session()->has('errorAlert'))
        <div class="alert alert-danger" role="alert"> {{ session('mensajeAlert') }} </div>
    @endif
    
    
       <div class="row">
         
            <table class="table table-striped table-hover">
                <thead>
                        <th>id</th>
                        <th>nombre</th>
                        <th>apellidos</th>
                        <th>fechaNacimiento</th>
                        <th>correoElectronico</th>
                        <th>clave</th>
                        <th>telefono</th>
                        <th>direccion</th>
                        <th>ip</th>
                        <th>estadoCivil</th>
                        <th>sueldoAnual</th>
                        <th colspan = "3">acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>apellidos</th>
                        <th>fechaNacimiento</th>
                        <th>correoElectronico</th>
                        <th>clave</th>
                        <th>telefono</th>
                        <th>direccion</th>
                        <th>ip</th>
                        <th>estadoCivil</th>
                        <th>sueldoAnual</th>
                        <th colspan = "3">acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->fechaNacimiento }}</td>
                            <td>{{ $cliente->correoElectronico }}</td>
                            <td>{{ $cliente->clave }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ Request::ip() }}</td>
                            <td>{{ $cliente->estadoCivil }}</td>
                            <td>{{ $cliente->sueldoAnual }}</td>
                            <td><a href="{{ url('cliente/' . $cliente->id) }}" class="btn btn-outline-info">Ver</a></td>
                            <td><a href="{{ url('cliente/' . $cliente->id . '/edit') }}" class="btn btn-outline-success">Editar</a></td>
                            <td>
                                <form action = "{{ url('cliente/' . $cliente->id) }}" method= post class="destroy">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-outline-danger" value="Eliminar"/>
                                </form>    
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
            
        </div>
        
        <div class= "row">
            <a href="{{ url('cliente/create') }}" class="btn btn-outline-dark"> Agregar cliente </a>
        </div>
        
    
        
@stop