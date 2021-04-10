<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use Livewire\WithPagination;
use Cart;

class Services extends Component{

	protected $queryString = ['search' => ['except' => '']];

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $limite;

    public function render(){

    	if ($this->limite == 1) {
            $servicios = Servicio::where('estado',1)->limit(4)->get();
        }else{
            $servicios = Servicio::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->orderBy('id','desc')->paginate(20);
        }

        return view('livewire.frontend.services',["servicios"=>$servicios]);
    
    }

    public function addcita($id){

        $servicio = Servicio::find($id);  

        if ($servicio->oferta) {
         	$precio = $servicio->oferta;
        }else{
         	$precio = $servicio->precio;
        }

        $ser_id="ser_id".$servicio->id;

        Cart::add(
        	$ser_id,
        	$servicio->nombre,
        	$precio,
        	1,
        	array("urlfoto"=>$servicio->foto,"tipo"=>"servicio"),
        );

        $this->emit('alert', ['type' => 'success', 'message' => 'Servicio agregado correctamente.']);

         
    }

}
