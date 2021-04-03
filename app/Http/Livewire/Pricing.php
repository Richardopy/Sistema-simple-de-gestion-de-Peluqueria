<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Cart;
use Session;

class Pricing extends Component
{

    protected $listeners = ['cartDelete' => 'render'];

    public function render()
    {
        $productos = Producto::where('estado',1)->get();
        return view('livewire.frontend.pricing',["productos"=>$productos]);
    }


    public function addcarrito($id){

        $producto = Producto::find($id);  

        if ($producto->oferta) {
         	$precio = $producto->oferta;
        }else{
         	$precio = $producto->precio;
        }

        Cart::add(
        	$producto->id,
        	$producto->nombre,
        	$precio,
        	1,
        	array("urlfoto"=>$producto->foto),
        );

        $this->emit('alert', ['type' => 'success', 'message' => 'Producto agregado correctamente.']);
        $this->emit('cartAdded');

         
    }

}
