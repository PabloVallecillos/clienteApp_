@extends('base')

@section('contenido')

<table class="table table-striped table-hover">
    <tr>
        <td>id</td>
        <td>
            {{ $cliente->id }}
        </td>
    </tr>
    <tr>
        <td>Nombre</td>
        <td>
            {{ $cliente->nombre }}
        </td>
    </tr>
    <tr>
        <td>Apellidos</td>
        <td>
            {{ $cliente->apellidos }}
        </td>
    </tr>
    <tr>
        <td>Fecha Nacimiento</td>
        <td>
            {{ $cliente->fechaNacimiento }}
        </td>
    </tr>
    <tr> 
        <td>Correo Electronico</td>
        <td>
            {{ $cliente->correoElectronico }}
        </td>
    </tr>
    <tr>
        <td>Clave</td>
        <td>
            {{ $cliente->clave }}
        </td>
    </tr>
    <tr>
        <td>Telefono</td>
        <td>
            {{ $cliente->telefono }}
        </td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td>
            {{ $cliente->direccion }}
        </td>
    </tr>
    <tr>
        <td>Dirección Ip</td>
        <td>
            {{ $cliente->ip }}
        </td>
    </tr>
    <tr>
        <td>Estado Civil</td>
        <td>
            {{ $cliente->ip }}
        </td>
    </tr>
    <tr>
        <td>Sueldo Anual</td>
        <td>
            {{ $cliente->sueldoAnual }}
        </td>
    </tr>
    
</table>

<tr>
    <td>&nbsp;</td>
    <td class="text-center">
        <a href="{{ route('cliente.index') }}" class="btn btn-info">volver</a>
    </td>
</tr>

@stop