<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Servicio;

class Correos extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $servicioeestado=0;

	public $LeerMode = false;

	public $nombre,$precio,$oferta,$estado;

    public function render(){

    	if ($this->mensajeestado == 0) {
    		$servicio = Servicio::where('estado',0)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}elseif ($this->mensajeestado == 1) {
    		$servicio = Servicio::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}else{
    		$servicio = Servicio::where('estado',2)->where('nombre','LIKE','%'.$this->search.'%')->paginate(10);
    	}

    	$contadorservicio = Servicio::where('estado',0)->count();

        return view('livewire.serviciosrecepcion.correos',["servicio"=>$servicio,"contador"=>$contador]);
    
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
