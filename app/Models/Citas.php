<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    protected $table='citas';

    protected $primaryKey='id';

    public $timestamps='true';

    protected $fillable=[
    	 'cita_dia',
         'cita_hora',
    ];
}
