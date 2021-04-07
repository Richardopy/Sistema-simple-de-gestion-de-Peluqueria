<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Gastos;

class AddGasto extends Component
{   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $costos_id, $costo, $observacion;
    
    public $updateMode = false;
    
    public function render(){

        $costos = Gastos::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.gastos.index',["costos"=>$costos]);

    }
    
    private function resetInputFields(){
        $this->nombre = '';
        $this->costo = '';
        $this->observacion = '';

    }

   public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'observacion' => 'required',
        ]);


        Gastos::create([
            'nombre' => $this->nombre,
            'costo' => $this->costo,
            'observacion' => $this->observacion,

        ]);

        session()->flash('message', 'Gasto agregado correctamente!');

        $this->resetInputFields();

    }
    public function edit($id)
    {
        $this->updateMode = true;
        $gastos = Gastos::where('id',$id)->first();
        $this->nombre = $gastos->nombre;
        $this->costo = $gastos->costo;    
        $this->observacion = $gastos->observacion; 
 
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'observacion' => 'required',
        ]);

        if ($this->costos_id) {
            $gastos = Gastos::find($this->costos_id);
            $gastos->update([
                'nombre' => $this->nombre,
                'costo' => $this->costo,
                'observacion' => $this->observacion,

            ]);
            $this->updateMode = false;
            session()->flash('message', 'Costo actualizado correctamente');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $costos = Gastos::find($id);
            $costos->estado=0;
            $costos->update();
            session()->flash('message', 'Gasto eliminado correctamente');
        }
    }
}
