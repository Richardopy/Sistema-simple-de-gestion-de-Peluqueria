<div>
    {!! Form::open(array('url'=>'admin/facturacion','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
    {{Form::token()}}
    	<div class="row">
    		<div class="col-md-6">
    			<div class="form-group" wire:ignore>
                    <label for="informacion">Seleccione Cliente </label><span style="cursor: pointer;" class="badge badge-success" data-toggle="modal" data-target="#exampleModalCenter"> Crear cliente</span><br>
                    <select class="js-example-basic-multiple form-select select2" id="js-example-basic-multiple" style="width: 100%" name="cliente_id" required>
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
    				  	<input type="number" wire:model="descuento" class="form-control" placeholder="Descuento" id="descuento" name="descuento">
    				  	<div class="input-group-append">
    				    	<span class="input-group-text" id="basic-addon2">%</span>
    				  	</div>
    				</div>
                </div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
                <label for="informacion">Seleccione producto:</label><br>
                <input list="suggestionList" id="answerInput" wire:model="selectpro" class="form-control" wire:change="changeEvent">
                <datalist id="suggestionList">
                    @foreach ($productos as $value)
                        <option value="{{ $value->codigo }}">{{ $value->nombre }}</option>
                    @endforeach
                </datalist><br>
    		</div>
    	</div>
        <div class="row">
            <div class="col-md-12 table-responsive" wire:ignore>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="addproductos">
                        
                    </tbody>
                </table><hr>
            </div> 
            <div class="col-md-9"></div>
            <div class="col-md-3">
                <p wire:ignore><b style="font-size: 26px;">SubTotal: </b><span id="subtotal" style="font-size: 26px;">0</span></p>
                <p><b style="font-size: 26px;">Descuento: </b><span id="descuento" style="font-size: 26px;">{{ $descuento }}</span></p>
                <p wire:ignore><b style="font-size: 26px;">Total: </b><span id="total" style="font-size: 26px;">0</span></p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Efectivo</span>
                    <div class="input-group-append">
                        <input type="number" min="50" class="form-control" name="efectivo" placeholder="Ingrese efectivo" required>
                    </div>
                </div>
                <center><button type="submit" class="btn btn-success">Guardar</button></center>
            </div>
        </div>
    {!!Form::close()!!}

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