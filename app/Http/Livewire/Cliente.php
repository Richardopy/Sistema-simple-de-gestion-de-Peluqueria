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
    public $name,$password,$email;


    public function render(){

        $clientes = User::where('nivel',3)->where('name','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.cliente',["clientes"=>$clientes]);

    }
    
    private function resetInputFields(){
        $this->name = '';
        $this->password = '';
        $this->email = '';
    }

    public function store(){
        $validatedDate = $this->validate([
            'name' => 'required,string,max:255',
            'password' => 'required',
            'email' => 'required,string,email,max:255,unique:users',
        ]);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'nivel' => 3,
        ]);

    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }


    public function delete($id){
        if($id){
            $cliente = Cliente::find($id);
            $cliente->estado=0;
            $cliente->update();
            session()->flash('message', 'Cliente eliminado correctamente');
        }
    }
}
