<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Carritoservicio extends Component{

	$sesionservicio = "sesionservicio";

	Cart::session($sesionservicio);

    public function render(){
        return view('livewire.carritoservicio');
    }

    public function deletecarritoservicio($id){ 

        Cart::session($sesionservicio)->remove([
        	
        	'id' => $id,

        ]);
        
        $this->emit('alert', ['type' => 'error', 'message' => 'Producto eliminado correctamente.']);
        $this->emit('cartDelete');

    }

    public function cantidadservicio($id,$data){ 
		Cart::session($sesionservicio)->update(($id,[
			'quantity' => $data,
		]);

    }
}
