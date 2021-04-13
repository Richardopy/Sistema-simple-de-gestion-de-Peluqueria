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

    public $minimo,$maximo,$dia;

    public function render(){
        
        $empresa = Empresa::findorFail(1);

        return view('livewire.frontend.agendarcita',["empresa"=>$empresa]);
    }

    public function changeEvent(){

        $empresa = Empresa::findorFail(1);

        if ($this->dia == "lunes") {
            $this->minimo=$empresa->lunesingreso;
            $this->maximo=$empresa->lunessalida;
        }elseif ($this->dia == "martes"){
            $this->minimo=$empresa->martesingreso;
            $this->maximo=$empresa->martessalida;
        }elseif ($this->dia == "miercoles"){
            $this->minimo=$empresa->miercolesingreso;
            $this->maximo=$empresa->miercolessalida;    
        }elseif ($this->dia == "jueves"){
            $this->minimo=$empresa->juevesingreso;
            $this->maximo=$empresa->juevessalida;
        }elseif ($this->dia == "viernes"){
            $this->minimo=$empresa->viernesingreso;
            $this->maximo=$empresa->viernessalida;
        }elseif ($this->dia == "sabado"){
            $this->minimo=$empresa->sabadoingreso;
            $this->maximo=$empresa->sabadosalida;
        }elseif ($this->dia == "domingo"){
            $this->minimo=$empresa->domingoingreso;
            $this->maximo=$empresa->domingosalida;
        }
    }
}
