<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre</label>
        <input type="text" class="form-control" wire:model="nombre" id="exampleFormControlInput1" placeholder="Enter Name">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
        <label for="exampleFormControlInput1">Observación de la Categoria:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese alguna observción" wire:model="observacion">
        @error('observacion') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>