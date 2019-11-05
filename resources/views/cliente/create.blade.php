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

<form action = "{{ url('cliente') }}" method= post>
    
    @csrf
    
    <h5>Nombre:</h5>
    <input type="text" name="nombre" required placeholder="Nombre del cliente" minlength="2" maxlength="100" value="{{ old('nombre') }}">
    @error('nombre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Apellidos:</h5>
    <input type="text" name="apellidos" required placeholder="Apellidos del cliente" minlength="2" maxlength="100" value="{{ old('apellidos') }}">
    @error('apellidos')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Fecha Nacimiento:</h5>
    <input type="date" name="fechaNacimiento" required placeholder="fechaNacimiento aaaa/mm/dd" min="0.000" max="1.00" step = "0.01" value="{{ old('fechaNacimiento') }}">
    @error('fechaNacimiento')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Correo Electrónico:</h5>
    <input type="email" name="correoElectronico" required placeholder="Introduzca el correoElectronico del cliente " maxlength="100" value="{{ old('correoElectronico') }}">
    @error('correoElectronico')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Contraseña:</h5>
    <input type="password" name="clave" required placeholder="Introduzca la contraseña del cliente" minlength="5" maxlength="100" value="">
    @error('clave')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Repita Contraseña:</h5>
    <input type="password" name="clave" required placeholder="Introduzca la contraseña del cliente" minlength="5" maxlength="100" value="">
    @error('clave')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Telefono:</h5>
    <input type="tel" name="telefono" required placeholder="Introduzca el telefono del cliente" maxlength="100" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" value="{{ old('telefono') }}">
    @error('telefono')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Dirección:</h5>
    <textarea class= "form-control" name="direccion" placeholder="Introduzca la direccion del cliente"> {{ old('direccion') }} </textarea>
    @error('direccion')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Estado Civil:</h5>
    <input type="text" name="estadoCivil" required placeholder="Estado civil del cliente" maxlength="20" value="{{ old('estadoCivil') }}">
    @error('estadoCivil')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <h5>Sueldo Anual:</h5>
    <input type="number" name="sueldoAnual" required placeholder="Sueldo anual del cliente" min="0.00" max="9999999.999" step="0.01" value="{{ old('sueldoAnual') }}">
    @error('sueldoAnual')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    </br>
    
    <input class="btn btn-outline-dark" type="submit" value="enviar">

</form>



@stop