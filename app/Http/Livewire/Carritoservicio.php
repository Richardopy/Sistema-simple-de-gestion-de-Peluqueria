<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Carritoservicio extends Component{

    public function render(){
        return view('livewire.carritoservicio');
    }

    public function deletecarritoservicio($id){ 

        Cart::remove([
        	
        	'id' => $id,

        ]);
        
        $this->emit('alert', ['type' => 'error', 'message' => 'Servicio eliminado correctamente.']);
        $this->emit('cartDelete');

    }

}
