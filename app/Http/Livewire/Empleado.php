<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Empleado extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';
    public $search='';
    public $name;
    public $updateMode = false;
    public function render(){

        $empleados = User::where('nivel',2)->where('name','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.empleado.index',["empleados"=>$empleados]);

    }
    private function resetInputFields(){
        $this->name = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $empleado = Empleado::where('id',$id)->first();
        $this->name = $empleado->name;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }


    public function delete($id)
    {
        if($id){
            $empleado = Empleado::find($id);
            $empleado->estado=0;
            $empleado->update();
            session()->flash('message', 'Empleado eliminado correctamente');
        }
    }
}
