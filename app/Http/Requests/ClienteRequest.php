<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function attributes(){
        return [
            'nombre'                        => 'Nombre de cliente',   
            'apellidos'                     => 'Apellidos de cliente',
            'fechaNacimiento'               => 'Fecha nacimiento del cliente',
            'correoElectronico'             => 'Correo electrónico del cliente',
            'clave'                         => 'Contraseña del cliente',
            'telefono'                      => 'Telefono del cliente',
            'direccion'                     => 'Dirección del cliente',
            'ip'                            => 'Dirección ip del cliente',
            'estadoCivil'                   => 'Estado civil del cliente',
            'sueldoAnual'                   => 'Sueldo anual del cliente',
        ];
    }
    
    public function messages(){
        
                            $required       = 'El campo :attribute es obligatorio';
                            $min            = 'La longitud mínima del campo :attribute es :min.';
                            $max            = 'La longitud máxima del campo :attribute es :max.';
                            $numeric        = 'El valor del campo :attribute debe ser numérico.';
                            $alpha          = 'El valor del campo :attribute debe ser alfa numérico.';
                            $dateformat     = 'El valor del campo :attribute debe estar introducido en formato d/m/Y';
                            $email          = 'El valor del campo :attribute debe estar introducido en formato email';
                            $confirmed      = 'El valor del campo :attribute debe estar introducido en el campo repite_clave';
                            $regex          = 'El valor del campo :attribute debe estar introducido en formato XX- xxx-xxx-xxx';
                            $ip             = 'El valor del campo :attribute debe ser una dirección ip';
                            $gte            = 'El valor del campo :attribute debe ser numérico.';
                            $lte            = 'El valor del campo :attribute no debe ser mayor que 99999999,99.';

        return [

            'nombre.required'               => $required,
            'nombre.min'                    => $min,
            'nombre.max'                    => $max,
            'nombre.alpha'                  => $alpha,

            'apellidos.required'            => $required,
            'apellidos.min'                 => $min,
            'apellidos.max'                 => $max,
            'apellidos.alpha'               => $alpha,

            'fechaNacimiento.required'      => $required,
            'fechaNacimiento.max'           => $max,
            'fechaNacimiento.dateformat'    => $dateformat,

            'correoElectronico.required'    => $required,
            'correoElectronico.max'         => $max,
            'correoElectronico.email'       => $email,

            'clave.required'                => $required,
            'clave.min'                     => $max,
            'clave.max'                     => $max,
            'clave.confirmed'               => $confirmed,

            'telefono.regex'                => $regex,
            'telefono.max'                  => $max,

            'direccion.min'                 => $max,
            'direccion.max'                 => $max,

            'ip.ip'                         => $ip,
            'ip.max'                        => $max,

            'estadoCivil.max'               => $max,

            'sueldoAnual.numeric'           => $required,
            'sueldoAnual.gte'               => $gte,
            'sueldoAnual.lte'               => $lte,

        ];
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'                        => 'required|alpha|min:2|max:100',
            'apellidos'                     => 'required|alpha|min:2|max:100',
            'fechaNacimiento'               => 'required|max:100',
            'correoElectronico'             => 'required|email|max:100',
            'clave'                         => 'required|min:5|max:100',
            'telefono'                      => 'nullable|max:100|regex:/[0-9]{3}-[0-9]{3}-[0-9]{3}/',
            'direccion'                     => 'nullable|min:2|max:100',
            'ip'                            => 'nullable|max:20',
            'estadoCivil'                   => 'nullable|max:20',
            'sueldoAnual'                   => 'nullable|numeric|gte:0|lte:99999999.99',
        ];
    }
}
