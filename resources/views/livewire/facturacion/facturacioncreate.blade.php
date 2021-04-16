<div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label for="informacion">Seleccione Cliente </label><span style="cursor: pointer;" class="badge badge-success" data-toggle="modal" data-target="#exampleModalCenter"> Crear cliente</span><br>
                <select class="js-example-basic-multiple" style="width: 100%" class="form-select select2" name="cliente_id" wire:model="cliente_id" required>
                	<option value="" focus>Seleccione un cliente</option>
                    @foreach($clientes as $value)
                        <option value="{{ $value->id }}">{{ $value->name }} <b>C.I.:</b> {{ $value->ci }}</option>
                    @endforeach 
                </select>  
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label for="informacion">Descuento</label><br>
                <div class="input-group mb-3">
				  	<input type="number" wire:model="descuento" class="form-control" placeholder="Descuento" aria-label="Recipient's username" aria-describedby="basic-addon2">
				  	<div class="input-group-append">
				    	<span class="input-group-text" id="basic-addon2">%</span>
				  	</div>
				</div>
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
                <label for="informacion">Seleccione producto</label><br>
                <select class="js-example" style="width: 100%" class="form-select select2" required>
                	<option value="" focus>Seleccione un producto</option>
                    @foreach($productos as $value)
                        <option value="{{ $value->id }}">{{ $value->nombre }} <b>Código:</b> {{ $value->codigo }}</option>
                    @endforeach
                </select>  
            </div>
		</div>
	</div>

    <div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crear Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre y Apellido</label>
                                <input type="text" class="form-control" wire:model="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre y Apellido">
                                @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" wire:model="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                                @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">RUC/CI</label>
                                <input type="text" class="form-control" wire:model="ci" id="exampleInputPassword1" placeholder="RUC/CI">
                                @error('ci') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div> 
                    </div>  
                    
                </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click="store()" class="btn btn-success" data-dismiss="modal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>