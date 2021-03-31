<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;
class Correos extends Component
{
    public function render(){

    	$contacto = Mensaje::get();
        return view('livewire.correos',["contacto"=>$contacto]);
    }
}
