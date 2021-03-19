<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre de la Categoria:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese categoria" wire:model="nombre">
        @error('nombre') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
<hr>