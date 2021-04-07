<hr>
<form>
    <div class="form-group">
        <input type="hidden" wire:model="proveedor_id">
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
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>