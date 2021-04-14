<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Servicio;
use App\Models\Producto;


class Lanzadornotificaciones extends Component
{
    public function render(){

    	$contador = Mensaje::where('estado',0)->count();
    	$contadorservicio = Servicio::where('estado',0)->count();
    	$contadorproducto = Producto::where('estado',0)->count();

        return view('livewire.lanzadornotificaciones',["contador"=>$contador,"contadorservicio"=>$contadorservicio,"contadorproducto"=>$contadorproducto]);

    }
}