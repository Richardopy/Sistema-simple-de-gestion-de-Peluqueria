<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Mensaje;

class Correos extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $mensajeestado=0;

	public $LeerMode = false;

	public $nombre,$update_at,$mensaje,$celular;

    public function render(){

    	if ($this->mensajeestado == 0) {
    		$contacto = Mensaje::where('estado',0)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}elseif ($this->mensajeestado == 1) {
    		$contacto = Mensaje::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}else{
    		$contacto = Mensaje::where('estado',2)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}

    	$contador = Mensaje::where('estado',0)->count();

        return view('livewire.correosadmin.correos',["contacto"=>$contacto,"contador"=>$contador]);
    
    }

    public function estado($estado){
    	$this->mensajeestado=$estado;
        $this->LeerMode = false;
    }

    public function leer($id){
    	$this->LeerMode = true;

    	$mensaje = Mensaje::where('id',$id)->first();
        
        $this->nombre = $mensaje->nombre;
        $this->update_at = $mensaje->update_at;
        $this->mensaje = $mensaje->mensaje;
        $this->celular = $mensaje->celular;

        $mensaje->estado=1;
        $mensaje->update();

    }
       
}
