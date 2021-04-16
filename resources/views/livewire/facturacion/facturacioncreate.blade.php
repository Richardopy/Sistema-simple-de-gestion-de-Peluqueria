<div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label for="informacion">Seleccione Cliente</label><br>
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
                <select class="js-example-basic-multiple" style="width: 100%" class="form-select select2" name="cliente_id" wire:model="cliente_id" required>
                	<option value="" focus>Seleccione un cliente</option>
                    @foreach($clientes as $value)
                        <option value="{{ $value->id }}">{{ $value->name }} <b>C.I.:</b> {{ $value->ci }}</option>
                    @endforeach
                </select>  
            </div>
		</div>
	</div>
</div>