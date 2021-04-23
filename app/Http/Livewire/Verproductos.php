<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CabeceraPedido;
use DB;
use Carbon\Carbon;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class Verproductos extends Component{

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

	public $LeerMode = false;

	public $usuario_id,$cabecera_id=0;

    public function render(){    

        $empresa = Empresa::findorFail(1);

        $producto=DB::table('cabecera_pedidos as ca')
            ->join('users as u','ca.usuario_id','u.id')
            ->select('ca.*','u.name','u.contacto')
            ->get()
            ->where('u.name','LIKE','%'.$this->search.'%');

        $cabecera = DB::table('cabecera_pedidos as ca')
            ->join('users as u','ca.usuario_id','u.id')
            ->select('ca.*','u.name','u.contacto')
            ->where('ca.id',$this->cabecera_id)->first();

        $productos = DB::table('pedidos as cp')
            ->join('productos as p','cp.producto_id','p.id')
            ->select('cp.*','p.nombre','p.foto')
            ->where('cp.cabecera_id',$this->cabecera_id)
            ->get();

        return view('livewire.verproductos',["producto"=>$producto,"cabecera"=>$cabecera,"productos"=>$productos,"empresa"=>$empresa,"productos"=>$productos]);
    }

    public function estado($estado){
    	$this->pedidoestado=$estado;
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
    }

    public function openModal(){
        $this->emit('show');
    }
}