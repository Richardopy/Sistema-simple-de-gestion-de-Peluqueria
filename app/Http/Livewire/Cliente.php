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

    public $name,$password,$email,$password_confirmation,$contacto,$cumpleanos,$cliente_id;

    public $updateMode = false;

    public function render(){

        $clientes = User::where('nivel',3)->where('name','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.cliente.index',["clientes"=>$clientes]);

    }
    
    private function resetInputFields(){
        $this->name = '';
        $this->password = '';
        $this->email = '';
        $this->contacto = '';
        $this->cumpleanos = '';
        $this->password_confirmation = '';
        $this->cliente_id = '';
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
            'contacto' => $this->contacto,
            'cumpleanos' => $this->cumpleanos,
            'password' => Hash::make($this->password),
            'nivel' => 3
        ]);
        $this->resetInputFields();
        session()->flash('message', 'Cliente creado correctamente');
    }

    public function edit($id){
        $this->updateMode = true;
        $cliente = User::find($id);
        $this->cliente_id = $id;
        $this->name = $cliente->name;
        $this->email = $cliente->email;
        $this->contacto = $cliente->contacto;
        $this->cumpleanos = $cliente->cumpleanos;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update($id){
        $validatedDate = $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ],
        [
            'name.required' => 'El campo nombre no puede estar vacio',
            'email.required' => 'El campo correo no puede estar vacio',        
        ]);
        $usuario=User::find($id);
            $usuario->name = $this->name;
            $usuario->email = $this->email;
            $usuario->contacto = $this->contacto;
            $usuario->cumpleanos = $this->cumpleanos;
            if($this->password){
                $usuario->password = Hash::make($this->password);
            }
        $usuario->update();
        $this->resetInputFields();
        $this->updateMode = false;
        session()->flash('message', 'Cliente creado correctamente');
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
