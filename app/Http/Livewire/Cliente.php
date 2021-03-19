<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Cliente extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search='';
    public $name;
    public $updateMode = false;
    public function render(){

        $clientes = User::where('nivel',3)->where('name','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.cliente.index',["clientes"=>$clientes]);

    }
    private function resetInputFields(){
        $this->name = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required'
            'nivel' => '3'
        ]);

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $cliente = Cliente::where('id',$id)->first();
        $this->name = $cliente->name;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }


    public function delete($id)
    {
        if($id){
            $cliente = Cliente::find($id);
            $cliente->estado=0;
            $cliente->update();
            session()->flash('message', 'Cliente eliminado correctamente');
        }
    }
}
