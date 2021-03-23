<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class Pricing extends Component
{
    public function render()
    {
        	$productos = Producto::where('estado',1)->get();
        return view('livewire.frontend.pricing',["productos"=>$productos]);
    }
}
