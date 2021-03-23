<hr>
<form>
    <div class="form-group">
        <label>Nombre del colaborador:</label>
        <input type="text" class="form-control" placeholder="Nombre" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>Correo Electrónico:</label>
        <input type="text" class="form-control" placeholder="correo@ejemplo.com" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>Contraseña:</label>
        <input type="password" class="form-control" placeholder="Contraseña" wire:model="password">
        @error('password') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label>Confirme su Contraseña:</label>
        <input type="password" class="form-control" placeholder="Confirmación de Contraseña" wire:model="password_confirmation">
        @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
   
   
    <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
</form>
<hr>