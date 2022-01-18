<hr>
<form>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Nombre de cliente:</label>
                <input type="text" class="form-control" placeholder="Nombre" wire:model="name">
                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Correo Electrónico:</label>
                <input type="email" class="form-control" placeholder="correo@ejemplo.com" wire:model="email">
                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Contacto:</label>
                <input type="number" class="form-control" placeholder="Contacto" wire:model="contacto">
                @error('contacto') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Fecha de nacimiento:</label>
                <input type="date" class="form-control" wire:model="cumpleanos">
                @error('cumpleanos') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Contraseña:</label>
                <input type="password" class="form-control" placeholder="Contraseña" wire:model="password">
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Confirme su Contraseña:</label>
                <input type="password" class="form-control" placeholder="Confirmación de Contraseña" wire:model="password_confirmation">
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="col-md-12">
            @if($updateMode)
                <button wire:click.prevent="update({{$cliente_id}})" class="btn btn-dark">Actualizar</button>
                <button wire:click.prevent="cancel()" class="btn btn-danger">Cancelar</button>
            @else
                <button wire:click.prevent="store()" class="btn btn-success">Guardar</button>
            @endif
        </div>
    </div>
</form>
<hr>