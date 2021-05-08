<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WithPagination;
use App\Models\Gastos; 
use App\Models\Producto; 
use App\Models\Proveedor; 


class Compras extends Component{

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $costos_id, $costo, $categoria_id;
    
    public $updateMode = false;
    
    public function render(){

        $productos=Producto::where('estado',1)->where('stock','>',1)->get();
        $proveedores=Proveedor::where('estado',1)->get();
        
        return view('livewire.compras.index',["productos"=>$productos,"proveedores"=>$proveedores]);
    }
    
    private function resetInputFields(){
        $this->nombre = '';
        $this->costo = '';
    }

   public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'costo' => 'required',
        ]);

        Gastos::create([
            'nombre' => $this->nombre,
            'costo' => $this->costo,
            'gastocategoria_id' => $this->categoria_id,
        ]);

        session()->flash('message', 'Compra agregada correctamente!');

        $this->resetInputFields();

    }
    public function edit($id)
    {
        $this->updateMode = true;
        $gastos = Gastos::where('id',$id)->first();
        $this->nombre = $gastos->nombre;
        $this->costo = $gastos->costo;    

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
        ]);

        if ($this->costos_id) {
            $gastos = Gastos::find($this->costos_id);
            $gastos->update([
                'nombre' => $this->nombre,
                'costo' => $this->costo,

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
            $costos->delete();
            session()->flash('message', 'Gasto eliminado correctamente');
        }
    }
}

