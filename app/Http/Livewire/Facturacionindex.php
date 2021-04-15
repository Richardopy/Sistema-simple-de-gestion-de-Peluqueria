<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Facturacionencabezado;
use DB;

class Facturacionindex extends Component{
	
	use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';

    public function render(){

    	$encabezado = DB::table('facturacionencabezados as f')
    		->join('users as u','f.cliente_id','u.id')
    		->select('f.*','u.name')
    		->where('u.name','LIKE','%'.$this->search.'%')->paginate(20);

        return view('livewire.facturacion.facturacionindex',["encabezado"=>$encabezado]);
        
    }
}
