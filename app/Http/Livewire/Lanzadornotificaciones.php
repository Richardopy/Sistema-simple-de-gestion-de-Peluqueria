<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mensaje;

class Lanzadornotificaciones extends Component
{
    public function render(){

    	$contador = Mensaje::where('estado',0)->count();

        return view('livewire.lanzadornotificaciones',["contador"=>$contador]);

    }
}
