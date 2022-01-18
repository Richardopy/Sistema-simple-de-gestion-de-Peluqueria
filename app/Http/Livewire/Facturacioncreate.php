<?php

namespace App\Http\Livewire; 

use Livewire\Component;
use App\Models\User;
use App\Models\Facturacionencabezado;
use App\Models\Facturacionproducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;
use Session;

class Facturacioncreate extends Component{

	public $cliente_id,$descuento=0,$name,$email,$ci,$selectpro,$credito,$producto_id,$efectivo;

    public $prod_cargados=[];

    public function render(){

    	$productos=Producto::where('estado',1)->where('stock','>',1)->get();
    	$clientes=User::where('estado',1)->get();

        return view('livewire.facturacion.facturacioncreate',["clientes"=>$clientes,"productos"=>$productos]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->ci = '';
        $this->prod_cargados=[];
    }

    public function store(){

        $validatedDate = $this->validate([
            'name' => 'required|max:255',
            'ci' => 'required',
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',

            'ci.required' => 'El campo RUC/CI no puede estar vacio',
        ]
        );

        $usuario=new User;

        $usuario->name = $this->name;
        $usuario->email = rand()."@".rand().".".rand();
        $usuario->password = Hash::make('cambiame123');
        $usuario->ci = $this->ci;
        $usuario->nivel = 3;

        $usuario->save();

        $this->emit('usuario', $usuario);

        $this->cliente_id = $usuario->id;

        $this->resetInputFields();

    }

    public function facturacion(){

        $encabezado=new Facturacionencabezado; 

            $encabezado->cliente_id=$this->cliente_id;
            if($this->credito){
                $encabezado->estado=$this->credito;
            }else{
                $encabezado->estado=1;
            }
            $encabezado->vendedor_id=Auth::user()->id;
            $encabezado->descuento=$this->descuento;

        $total=0;

        if ($encabezado->save()){

        	foreach($this->prod_cargados as $prod){

                $cargaproducto=new Facturacionproducto;

		    	$cargaproducto->encabezado_id=$encabezado->id;
		    	$cargaproducto->producto_id=$prod['id'];
		    	$cargaproducto->cantidad=$prod['cantidad'];
		    	$cargaproducto->precio=$prod['precio'];

		    	if ($cargaproducto->save()){
		    		$producto=Producto::findOrFail($prod['id']);
                    if($producto->tipo==1){
                        $producto->stock-=$prod['cantidad'];
                        $producto->update();
                    }
		    	}

		    	$total+=$prod['precio']*$prod['cantidad'];
            }
            if ($this->descuento) {
            	$total=$this->efectivo-($total-(($total*$this->descuento)/100));
            }else{
            	$total=$this->efectivo-$total;
            }
            
        }

        Session::flash('success', '¡La compra se creo correctamente!');

        $this->resetInputFields();
        $this->updateMode = 0;

        return Redirect::to('admin/facturacion?vuelto='.$total.'&id='.$encabezado->id);

    }

    public function openModal(){
        $this->emit('show');
    }

    public function changeEvent(){
        $producto=Producto::where('codigo',$this->selectpro)->first();
        if (array_key_exists($producto->id, $this->prod_cargados)){
            $this->prod_cargados[$producto->id]['cantidad']+=1;
        }else{
            $this->prod_cargados[$producto->id]['id']=$producto->id;
            $this->prod_cargados[$producto->id]['codigo']=$producto->codigo;
            $this->prod_cargados[$producto->id]['nombre']=$producto->nombre;
            $this->prod_cargados[$producto->id]['cantidad']=1;
            if($producto->oferta)
                $this->prod_cargados[$producto->id]['precio']=$producto->oferta;
            else{
                $this->prod_cargados[$producto->id]['precio']=$producto->precio;
            }
        }

        $this->selectpro="";
    }

    public function deleteitem($id){
        unset($this->prod_cargados[$id]);
    }

    public function changecantidad($cantidad,$id){
        $this->prod_cargados[$id]['cantidad']=$cantidad;
    }

    public function changeprecio($precio,$id){
        $this->prod_cargados[$id]['precio']=$precio;
    }
}
