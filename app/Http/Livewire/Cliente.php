<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Cliente extends Component{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $search='';
    public $name,$password,$email,$password_confirmation;


    public function render(){

        $clientes = User::where('nivel',3)->where('name','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.cliente.index',["clientes"=>$clientes]);

    }
    
    private function resetInputFields(){
        $this->name = '';
        $this->password = '';
        $this->email = '';
        $this->password_confirmation = '';
    }

    public function store(){

        $validatedDate = $this->validate([
            'name' => 'required|max:255',
            'password' => 'min:8 required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=> 'required|min:8',
            'email' => 'required|email|unique:users',
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',

            'password.required' => 'El campo contraseña no puede estar vacio',

            'password_confirmation.required' => 'El campo confirmar contraseña no puede estar vacio',
            
            'email.required' => 'El campo correo no puede estar vacio',        ]
        );

        return User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'nivel' => 3
        ]);

        $this->resetInputFields();

    }

    public function delete($id){
        if($id){
            $cliente = User::find($id);
            if ($cliente->estado==1) {
                $cliente->estado=0;
                session()->flash('message', 'Cliente desactivado correctamente');
            }else{
                $cliente->estado=1;
                session()->flash('message', 'Cliente activado correctamente');
            }
            
            $cliente->update();
            
        }
    }
}
