<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes; 

    protected $table = 'cliente';
    
    protected $hidden = ['created_at','updated_at','ip']; 
    
    protected $fillable = ['nombre', 'apellidos','fechaNacimiento','correoElectronico','clave','telefono','direccion','estadoCivil','sueldoAnual']; 
    
}
