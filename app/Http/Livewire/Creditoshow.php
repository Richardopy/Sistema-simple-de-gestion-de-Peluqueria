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

class Creditoshow extends Component{

    public $usuario_id,$montopago;

    public function render(){

        $cliente=User::find($this->usuario_id);

        $pagos=DB::table('creditos as c')
            ->join('users as u','c.cobrador_id','u.id')
            ->select('c.*','u.name as cobrador')
            ->where('c.cliente_id',$this->usuario_id)->orderBy('c.id','desc')->paginate(20);
        
        $facturasmonto=DB::table('facturacionproductos as fp')
            ->join('facturacionencabezados as fe','fp.encabezado_id','fe.id')
            ->where('fe.estado',2)->where('fe.cliente_id', $this->usuario_id)
            ->sum(\DB::raw('fp.precio * fp.cantidad'));
        
        $pagosmonto=Credito::where('estado',1)->where('cliente_id', $this->usuario_id)
            ->sum('monto');

        return view('livewire.creditoshow',["cliente"=>$cliente,"pagos"=>$pagos,"facturasmonto"=>$facturasmonto,"pagosmonto"=>$pagosmonto]);
    }

    public function cobrar(){
        $pago= new Credito;
            $pago->cliente_id=$this->usuario_id;
            $pago->monto=$this->montopago;
            $pago->cobrador_id=Auth::user()->id;
        if($pago->save()){
            $this->montopago="";
            $this->emit('alert', ['type' => 'success', 'message' => 'Cobro realizado correctamente!']);
        }
        
    }

    public function delete($id){
        $pago=Credito::find($id);
            $pago->estado=0;
        $pago->update();
        $this->emit('alert', ['type' => 'error', 'message' => 'Cobro anulado correctamente!']);
    }
}
