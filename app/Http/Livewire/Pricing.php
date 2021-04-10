<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;
use Cart;

class Pricing extends Component{

    protected $listeners = ['cartDelete' => 'render'];

    protected $queryString = ['search' => ['except' => '']];

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $limite;

    public function render(){
        if ($this->limite == 1) {
            $productos = Producto::where('estado',1)->limit(9)->get();
        }else{
            $productos = Producto::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        }
        
        return view('livewire.frontend.pricing',["productos"=>$productos]);
    }


    public function addcarrito($id){

        $producto = Producto::find($id);  

        if ($producto->oferta) {
         	$precio = $producto->oferta;
        }else{
         	$precio = $producto->precio;
        }

        $pro_id="pro_id".$producto->id;

        Cart::add(
        	$pro_id,
        	$producto->nombre,
        	$precio,
        	1,
        	array("urlfoto"=>$producto->foto,"tipo"=>"producto"),
        );

        $this->emit('alert', ['type' => 'success', 'message' => 'Producto agregado correctamente.']);
        $this->emit('cartAdded');

         
    }

}
