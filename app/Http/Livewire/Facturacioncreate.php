<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Facturacioncreate extends Component{

	public $cliente_id,$descuento;

    public function render(){

    	$clientes=User::where('estado',1)->get();

        return view('livewire.facturacion.facturacioncreate',["clientes"=>$clientes]);
    }
}
