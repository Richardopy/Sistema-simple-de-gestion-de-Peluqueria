<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor;

class Proveedores extends Component{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search='';
    
    public $nombre, $proveedor_id, $direccion, $ruc;
    
    public $updateMode = false;
    
    public function render(){

        $proveedores = Proveedor::where('estado',1)->where('nombre','LIKE','%'.$this->search.'%')->paginate(20);
        
        return view('livewire.proveedor.index',["proveedores"=>$proveedores]);

    }
    
    private function resetInputFields(){
        $this->nombre = '';
        $this->ruc = '';
        $this->direccion = '';

    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
        ]);


        Proveedor::create([
            'nombre' => $this->nombre,
            'ruc' => $this->ruc,
            'direccion' => $this->direccion,

        ]);

        session()->flash('message', 'Proveedor agregado correctamente!');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $proveedor = Proveedor::where('id',$id)->first();
        $this->nombre = $proveedor->nombre;
        $this->proveedor_id = $proveedor->id;
        $this->ruc = $proveedor->ruc;
        $this->direccion = $proveedor->direccion;

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

        if ($this->proveedor_id) {
            $proveedor = Proveedor::find($this->proveedor_id);
            $proveedor->update([
                'nombre' => $this->nombre,
                'ruc' => $this->ruc,
                'direccion' => $this->direccion,

            ]);
            $this->updateMode = false;
            session()->flash('message', 'Proveedor actualizado correctamente');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            $proveedor = Proveedor::find($id);
            $proveedor->estado=0;
            $proveedor->update();
            session()->flash('message', 'Proveedor eliminada correctamente');
        }
    }
}
