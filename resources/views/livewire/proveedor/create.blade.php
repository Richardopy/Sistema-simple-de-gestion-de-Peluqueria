<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre del Proveedor:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese nombre del proveedor" wire:model="nombre">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput1">Ruc del Proveedor:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese ruc del proveedor" wire:model="ruc">
        @error('ruc') <span class="text-danger">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput1">Dirección del Proveedor:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese dirección del proveedor" wire:model="direccion">
        @error('direccion') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

   
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
<hr>