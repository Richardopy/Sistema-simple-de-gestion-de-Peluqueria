<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;

class Services extends Component
{
    public function render()
    {
    	$servicios = Servicio::where('estado',1)->get();
        return view('livewire.frontend.services',["servicios"=>$servicios]);
    }

}
