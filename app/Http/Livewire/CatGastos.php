<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoriaGastos;

class CatGastos extends Component{
   
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $categoria_id, $observacion;
    
    public $updateMode = false;
    
    public function render(){

        $categorias = CategoriaGastos::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.categoriagastos.index',["categorias"=>$categorias]);

    }
    
    private function resetInputFields(){
        $this->nombre = '';
        $this->observacion = '';

    }

   public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
        ]);


        CategoriaGastos::create([
            'nombre' => $this->nombre,
            'observacion' => $this->observacion,

        ]);

        $this->emit('alert', ['type' => 'success', 'message' => 'Categoria de gastos agregado correctamente!']);

        $this->resetInputFields();

    }
    public function edit($id)
    {
        $this->updateMode = true;
        $categoria = CategoriaGastos::where('id',$id)->first();
        $this->nombre = $categoria->nombre;
        $this->categoria_id = $categoria->id;    
        $this->observacion = $categoria->observacion; 
 
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

        ]);

        if ($this->categoria_id) {
            $categoria = CategoriaGastos::find($this->categoria_id);
            $categoria->update([
                'nombre' => $this->nombre,
                'observacion' => $this->observacion,
            ]);
            $this->updateMode = false;
            $this->emit('alert', ['type' => 'success', 'message' => 'Categoria de gastos actualizada correctamente!']);
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $categoria = CategoriaGastos::find($id);
            $categoria->estado=0;
            $categoria->update();
            $this->emit('alert', ['type' => 'error', 'message' => 'Categoria eliminada correctamente!']);
        }
    }
}
