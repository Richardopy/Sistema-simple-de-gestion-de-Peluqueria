<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraCita;

class Serviciorecepcion extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $mensajeestado=0;

	public $LeerMode = false;

	public $usuario_id,$precio,$oferta,$estado;

    public function render(){

    	if ($this->mensajeestado == 0) {
    		$servicio = CabeceraCita::where('estado',0)->where('usuario_id','LIKE','%'.$this->search.'%')->paginate(10);
    	}elseif ($this->mensajeestado == 1) {
    		$servicio = CabeceraCita::where('estado',1)->where('usuario_id','LIKE','%'.$this->search.'%')->paginate(10);
    	}else{
    		$servicio = CabeceraCita::where('estado',2)->where('usuario_id','LIKE','%'.$this->search.'%')->paginate(10);
    	}

    	$contadorservicio = CabeceraCita::where('estado',0)->count();

        return view('livewire.serviciosrecepcion.serviciosrecepcion',["servicio"=>$servicio,"contadorservicio"=>$contadorservicio]);
    
    }

    public function estado($estado){
    	$this->mensajeestado=$estado;
        $this->LeerMode = false;
    }

    public function leer($id){
    	$this->LeerMode = true;

    	$mensaje = CabeceraCita::where('id',$id)->first();
        
        $this->usuario_id = $mensaje->usuario_id;
        $this->update_at = $mensaje->update_at;
        $this->cita_dia = $mensaje->cita_dia;
        $this->cita_hora = $mensaje->cita_hora;

        $mensaje->estado=1;
        $mensaje->update();

    }
       
}
