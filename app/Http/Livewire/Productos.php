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

        return view('livewire.productos',["productos"=>$productos]);
    }
}
