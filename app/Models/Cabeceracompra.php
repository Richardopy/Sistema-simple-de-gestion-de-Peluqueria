<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabeceracompra extends Model
{
    use HasFactory;

    protected $table='cabecera_compra';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	'proveedor_id',
	    'estado',
    ];
}
