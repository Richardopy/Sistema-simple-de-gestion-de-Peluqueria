<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Producto;

class Productos extends Component{

	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';


    public function render(){

    	$productos = Producto::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);

        $contadorproductos = Producto::where('estado',0)->count();

        return view('livewire.productos',["productos"=>$productos,"contadorproductos"=>$contadorproductos]);
    }

    public function delete($id)
    {
        if($id){
            $producto = Producto::find($id);
            $producto->estado=0;
            $producto->update();
            session()->flash('message', 'Producto eliminado correctamente');
        }
}
}
