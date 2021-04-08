<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use Livewire\WithPagination;
use Cart;

class Serviciosfrontend extends Component{


    protected $listeners = ['cartDelete' => 'render'];

    protected $queryString = ['search' => ['except' => '']];

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $limite;

    public function render(){
        if ($this->limite == 1) {
            $servicios = Servicio::where('estado',1)->limit(9)->get();
        }else{
            $servicios = Servicio::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        }
        
        return view('livewire.frontend.serviciosfrontend',["servicios"=>$servicios]);
    }


    public function addcarrito($id){

        $servicios = Servicio::find($id);  

        if ($servicios->oferta) {
         	$precio = $servicios->oferta;
        }else{
         	$precio = $servicios->precio;
        }

        Cart::add(
        	$servicios->id,
        	$servicios->nombre,
        	$precio,
        	1,
        	array("urlfoto"=>$servicios->foto),
        );

        $this->emit('alert', ['type' => 'success', 'message' => 'Servicio agregado correctamente.']);
        $this->emit('cartAdded');

         
    }

}



