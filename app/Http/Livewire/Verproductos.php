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

	public $usuario_id,$cabecera_id=0;

    public function render(){    

        $cabecera=CabeceraPedido::where('usuario_id',Auth::user()->id)->paginate('20');

        return view('livewire.verproductos',["cabecera"=>$cabecera]);
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