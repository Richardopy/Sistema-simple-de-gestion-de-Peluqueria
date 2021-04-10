<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use Livewire\WithPagination;
use App\Models\Empresa;

class Agendarcita extends Component
{
    
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
        	$empresa = Empresa::findorFail(1);

        return view('livewire.frontend.agendarcita',["servicios"=>$servicios, "empresa"=>$empresa]);
    }

    public function addcita($id){

        $servicios = Servicio::find($id);  

        if ($servicios->oferta) {
         	$precio = $servicios->oferta;
        }else{
         	$precio = $servicios->precio;
        }
	}
}
