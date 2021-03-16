<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Servicio;

class Servicios extends Component{

	use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';


    public function render(){

    	$servicios = Servicio::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);

        return view('livewire.servicios',["servicios"=>$servicios]);
    }

    public function delete($id)
    {
        if($id){
            $servicio = Servicio::find($id);
            $servicio->estado=0;
            $servicio->update();
            session()->flash('message', 'Servicio eliminado correctamente');
        }
}
}
