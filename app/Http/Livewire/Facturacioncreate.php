<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Producto;

class Facturacioncreate extends Component{

	public $cliente_id,$descuento;

    public function render(){

    	$productos=Producto::where('estado',1)->get();
    	$clientes=User::where('estado',1)->get();

        return view('livewire.facturacion.facturacioncreate',["clientes"=>$clientes,"productos"=>$productos]);
    }
}
