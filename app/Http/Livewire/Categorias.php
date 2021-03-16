<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search='';

    public $nombre, $categoria_id;
    public $updateMode = false;

    public function render(){

        $categorias = Categoria::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.categoria.index',["categorias"=>$categorias]);


    }
    private function resetInputFields(){
        $this->nombre = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required'
        ]);

        Categoria::create($validatedDate);

        session()->flash('message', 'Categoria agregada correctamente!');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $categoria = Categoria::where('id',$id)->first();
        $this->nombre = $categoria->nombre;
        $this->categoria_id = $categoria->id;       
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
            $categoria = Categoria::find($this->categoria_id);
            $categoria->update([
                'nombre' => $this->nombre,

            ]);
            $this->updateMode = false;
            session()->flash('message', 'Categoria actualizada correctamente');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $categoria = Categoria::find($id);
            $categoria->estado=0;
            $categoria->update();
            session()->flash('message', 'Categoria eliminada correctamente');
        }
    }
}
