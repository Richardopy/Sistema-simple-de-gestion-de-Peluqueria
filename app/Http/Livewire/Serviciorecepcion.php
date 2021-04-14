<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraCita;
use DB;
use Carbon\Carbon;

class Serviciorecepcion extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $mensajeestado=0;

	public $LeerMode = false;

	public $usuario_id,$cabecera_id=0;

    public $msmstate;

    public function render(){

    	if ($this->mensajeestado == 0) {
            $servicio=DB::table('cabecera_citas as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name')
                ->where('ca.estado',0)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);

    	}elseif ($this->mensajeestado == 1) {
    		$servicio=DB::table('cabecera_citas as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name')
                ->where('ca.estado',1)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}else{
    		$servicio=DB::table('cabecera_citas as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name')
                ->where('ca.estado',2)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}

        $contadorservicio = CabeceraCita::where('estado',0)->count();
        $contadorservicioagendado = CabeceraCita::where('estado',1)->count();



        if ($this->cabecera_id != 0) {
            $cabecera = DB::table('cabecera_citas as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name')
                ->where('ca.id',$this->cabecera_id)->first();

            $servicios = DB::table('servicio_citas as se')
                ->join('servicios as s','se.servicio_id','s.id')
                ->select('se.*','s.nombre','s.foto')
                ->where('se.cabecera_id',$this->cabecera_id)
                ->get();

            return view('livewire.serviciosrecepcion.serviciosrecepcion',["servicio"=>$servicio,"contadorservicio"=>$contadorservicio,"cabecera"=>$cabecera,"servicios"=>$servicios,"contadorservicioagendado"=>$contadorservicioagendado]);
        }else{
            return view('livewire.serviciosrecepcion.serviciosrecepcion',["servicio"=>$servicio,"contadorservicio"=>$contadorservicio,"contadorservicioagendado"=>$contadorservicioagendado]);
        }
    
    }

    public function estado($estado){
    	$this->mensajeestado=$estado;
        $this->cabecera_id=0;
        $this->LeerMode = false;
        $this->msmstate = $estado;

    }

    public function leer($id){
    	$this->LeerMode = true;
        $this->cabecera_id=$id;

    }
    
     public function agendado($id){

        $mensaje = CabeceraCita::find($id);
        $mensaje->estado=1;
        $mensaje->update();
        $this->LeerMode = false;

    }
}
