<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacionencabezado extends Model{

    use HasFactory;

    protected $table='facturacionencabezados';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
        'cliente_id',
        'vendedor_id',
	    'descuento',
	    'estado',
    ];

}
