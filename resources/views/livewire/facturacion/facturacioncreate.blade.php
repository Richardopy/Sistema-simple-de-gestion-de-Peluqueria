<div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
                <label for="informacion">Seleccione Cliente</label><br>
                <select class="js-example-basic-multiple" style="width: 100%" class="form-select select2" name="cliente_id" wire:model="cliente_id" required>
                	<option value="">Seleccione un cliente</option>
                    @foreach($clientes as $value)
                        <option value="{{ $value->id }}">{{ $value->name }} <b>C.I.:</b> {{ $value->ci }}</option>
                    @endforeach
                </select>  
            </div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
                <label for="informacion">Descuento</label><br>
                <input type="number" wire:model="descuento" name="descuento"> 
            </div>
		</div>
	</div>
</div>