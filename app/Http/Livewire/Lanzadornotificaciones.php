<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
use App\Models\Producto;
use App\Models\CabeceraPedido;
use App\Models\CabeceraCita;


class Lanzadornotificaciones extends Component
{
    public function render(){

    	$contador = Mensaje::where('estado',0)->count();
    	$contadorservicio = Producto::where('estado',0)->where('tipo',2)->count();
    	$contadorproducto = Producto::where('estado',0)->where('tipo',1)->count();
    	$contadorproductosolicitud = CabeceraPedido::where('estado',0)->count();
    	$contadorserviciosolicitud = CabeceraCita::where('estado',0)->count();

        return view('livewire.lanzadornotificaciones',["contador"=>$contador,"contadorservicio"=>$contadorservicio,"contadorproducto"=>$contadorproducto,"contadorproductosolicitud"=>$contadorproductosolicitud,"contadorserviciosolicitud"=>$contadorserviciosolicitud]);

    }
}
