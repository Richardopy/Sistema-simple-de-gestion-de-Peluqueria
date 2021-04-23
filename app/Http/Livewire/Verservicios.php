<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class Verservicios extends Component{

    public function render(){
    	
    	$empresa=Empresa::findOrFail(1); 
        return view('livewire.verservicios',['empresa'=>$empresa]);
    }
}
