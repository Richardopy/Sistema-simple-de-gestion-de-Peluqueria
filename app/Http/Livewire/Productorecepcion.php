<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraPedido;
use App\Models\Empresa;
use DB;
use Carbon\Carbon;

class Productorecepcion extends Component{

	 use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $mensajeestado=0;

	public $LeerMode = false;

	public $usuario_id,$cabecera_id=0;

    public $msmstate,$dia,$hora;

    public function render(){

        $empresa = Empresa::findorFail(1);


    	if ($this->mensajeestado == 0) {
            $producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',0)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);

    	}elseif ($this->mensajeestado == 1) {
    		$producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',1)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}else{
    		$producto=DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.estado',2)
                ->where('u.name','LIKE','%'.$this->search.'%')
                ->paginate(10);
    	}

        $contadorproducto = CabeceraPedido::where('estado',0)->count();
        $contadorproductoprocesando = CabeceraPedido::where('estado',1)->count();



        if ($this->cabecera_id != 0) {
            $cabecera = DB::table('cabecera_pedidos as ca')
                ->join('users as u','ca.usuario_id','u.id')
                ->select('ca.*','u.name','u.contacto')
                ->where('ca.id',$this->cabecera_id)->first();

            $productos = DB::table('servicio_citas as se')
                ->join('servicios as s','se.servicio_id','s.id')
                ->select('se.*','s.nombre','s.foto')
                ->where('se.cabecera_id',$this->cabecera_id)
                ->get();

            return view('livewire.productosrecepcion.productosrecepcion',["producto"=>$producto,"contadorproductoprocesando"=>$contadorproductoprocesando,"cabecera"=>$cabecera,"productos"=>$productos,"contadorproducto"=>$contadorproducto,"empresa"=>$empresa]);
        }else{
            return view('livewire.productosrecepcion.productosrecepcion',["producto"=>$producto,"contadorproductoprocesando"=>$contadorproductoprocesando,"contadorproducto"=>$contadorproducto,"empresa"=>$empresa]);
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
        $cabecera = DB::table('cabecera_pedidos as ca')
            ->join('users as u','ca.usuario_id','u.id')
            ->select('ca.*','u.name','u.contacto')
            ->where('ca.id',$id)->first();
        $this->dia=$cabecera->cita_dia;
        $this->hora=$cabecera->cita_hora;

    }
    
    public function agendado($id){

        $mensaje = CabeceraPedido::find($id);
            $mensaje->estado=1;
            $mensaje->cita_dia=$this->dia;
            $mensaje->cita_hora=$this->hora;
        $mensaje->update();
        $this->LeerMode = false;

    }

    public function realizado($id){

        $mensaje = CabeceraPedido::find($id);
            $mensaje->estado=2;
        $mensaje->update();
        $this->LeerMode = false;

    }

    public function openModal(){
        $this->emit('show');
    }

}

