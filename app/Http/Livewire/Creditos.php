<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use App\Models\User;
use App\Models\Credito;
use Auth;
use DB;

class Creditos extends Component{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public $vista=0,$facturasmonto,$pagosmonto,$cliente_id,$montopago;

    public function render(){

    	$encabezado = DB::table('users as u')
    		->join('facturacionencabezados as f','f.cliente_id','u.id')
            ->where('u.name','LIKE','%'.$this->search.'%')
            ->where('f.estado',2)
    		->select('u.*')->distinct()->paginate(20);

        return view('livewire.creditos.index',["encabezado"=>$encabezado]);
    }

    
}
