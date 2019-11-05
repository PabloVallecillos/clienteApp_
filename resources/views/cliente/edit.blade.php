@extends('base')

@section('contenido')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action = "{{ url('cliente/' . $cliente->id) }}" method= post>
    
    @csrf
    @method('PUT')
    <table class="table table-striped table-hover">
        
        <tr>
            <td>id</td>
            <td>
                <input type="text" name="id" minlength="2" maxlength="255" placeholder="Descripcion del cliente" value="{{ $cliente->id }}" disabled>
                @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>
                <input type="text" name="nombre" required placeholder="Nombre del cliente" minlength="2" maxlength="100" value="{{ old('nombre', $cliente->nombre) }}">
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Apellidos</td>
            <td>
                 <input type="text" name="apellidos" required placeholder="Apellidos del cliente" minlength="2" maxlength="100" value="{{ old('apellidos', $cliente->apellidos) }}">
                @error('apellidos')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Fecha Nacimiento</td>
            <td>
                <input type="date" name="fechaNacimiento" required placeholder="fechaNacimiento aaaa/mm/dd" min="0.000" max="1.00" step = "0.01" value="{{ old('fechaNacimiento', $cliente->fechaNacimiento) }}">
                @error('fechaNacimiento')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Correo Electronico</td>
            <td>
                <input type="email" name="correoElectronico" required placeholder="Introduzca el correoElectronico del cliente " maxlength="100" value="{{ old('correoElectronico', $cliente->correoElectronico) }}">
                @error('correoElectronico')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Clave</td>
            <td>
                <input type="password" name="clave" required placeholder="Introduzca la contraseña del cliente" minlength="5" maxlength="100" value="{{ old('clave', $cliente->clave) }}">
                @error('clave')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td>
                <input type="tel" name="telefono" required placeholder="Introduzca el telefono del cliente" maxlength="100" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" value="{{ old('telefono',$cliente->telefono) }}">
                @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Dirección</td>
            <td>
                <textarea class= "form-control" name="direccion"> {{ old('direccion', $cliente->direccion) }} </textarea>
                @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Dirección ip</td>
            <td>
                <input type="text" name="ip"  maxlength="10" value="{{ old('ip',$cliente->ip) }}">
                @error('ip')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Estado civil</td>
            <td>
                <input type="text" name="estadoCivil" required placeholder="Estado civil del cliente" maxlength="20" value="{{ old('estadoCivil', $cliente->estadoCivil) }}">
                @error('estadoCivil')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <td>Sueldo Anual</td>
            <td>
                <input type="number" name="sueldoAnual" required placeholder="Sueldo anual del cliente" min="0.00" max="99999999.99" step="0.01" value="{{ old('sueldoAnual', $cliente->sueldoAnual) }}">
                @error('sueldoAnual')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        
    </table>
    <input type="submit" class="btn btn-outline-success" value="editar">
    <a href="{{ url('cliente/') }}" class="btn btn-outline-dark">volver</a>

</form>

@stop
