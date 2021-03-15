<hr>
<form>
    <div class="form-group">
        <input type="hidden" wire:model="categoria_id">
        <label for="exampleFormControlInput1">Nombre</label>
        <input type="text" class="form-control" wire:model="nombre" id="exampleFormControlInput1" placeholder="Enter Name">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="update()" class="btn btn-dark">Actualizar</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
</form>
<hr>