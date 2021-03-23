<hr>
<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre de cliente:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Correo Electrónico:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="correo@ejemplo.com" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Contraseña:</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Contraseña" wire:model="password">
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror

    </div>
     <div class="form-group">
        <label for="exampleFormControlInput1">Confirme su Contraseña:</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Confirmación de Contraseña" wire:model="password_confirmation">
        @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
<hr>