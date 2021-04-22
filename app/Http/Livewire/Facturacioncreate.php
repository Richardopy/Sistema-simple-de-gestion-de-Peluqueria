<?php

namespace App\Http\Livewire; 

use Livewire\Component;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Hash;

class Facturacioncreate extends Component{

	public $cliente_id,$descuento=0,$name,$email,$ci,$selectpro;

	public $selecciones = '';

    public function render(){

    	$productos=Producto::where('estado',1)->where('stock','>',1)->get();
    	$clientes=User::where('estado',1)->get();

        return view('livewire.facturacion.facturacioncreate',["clientes"=>$clientes,"productos"=>$productos]);
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->ci = '';
    }

    public function store(){

        $validatedDate = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'ci' => 'required',
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',

            'ci.required' => 'El campo RUC/CI no puede estar vacio',
            
            'email.required' => 'El campo correo no puede estar vacio',        ]
        );

        $usuario=new User;

        $usuario->name = $this->name;
        $usuario->email = $this->email;
        $usuario->password = Hash::make('cambiame123');
        $usuario->ci = $this->ci;
        $usuario->nivel = 3;

        $usuario->save();

        $this->emit('usuario', $usuario);

        $this->cliente_id = $usuario->id;

        $this->resetInputFields();

    }

    public function changeEvent(){
        $producto=Producto::where('codigo',$this->selectpro)->first();
        $this->selectpro = "";
        $this->emit('producto', $producto);
    }

    public function openModal(){
        $this->emit('show');
    }
}
