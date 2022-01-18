<div>
    <form wire:submit.prevent="facturacion">
    	<div class="row">
    		<div class="col-md-5">
    			<div class="form-group" wire:ignore>
                    <label for="informacion">(S)Seleccione Cliente </label><span style="cursor: pointer;" class="badge badge-success" data-toggle="modal" id="crearcliente" data-target="#exampleModalCenter"> (C)Crear cliente</span><br>
                    <select class="form-select" id="cliente_id" style="width: 100%" required>
                    	<option value="">Seleccione un cliente</option>
                        @foreach($clientes as $value)
                            <option value="{{ $value->id }}">{{ $value->name }} <b>C.I.:</b> {{ $value->ci }}</option>
                        @endforeach 
                    </select> 
                </div>
    		</div>
            <div class="col-md-2">
                <div class="form-check" align="center">
                    <label for="credito">(V)Venta crédito </label><br>
                    <input class="form-check-input" type="checkbox" value="2" wire:model="credito" id="credito">
                </div>
            </div>
    		<div class="col-md-5">
    			<div class="form-group">
                    <label for="informacion">(D)Descuento</label><br>
                    <div class="input-group mb-3">
    				  	<input type="number" wire:model="descuento" class="form-control" placeholder="Descuento" id="descuento">
    				  	<div class="input-group-append">
    				    	<span class="input-group-text" id="basic-addon2">%</span>
    				  	</div>
    				</div>
                </div>
    		</div>
    	</div>
    	<div class="row">
            <div class="col-md-12">
                <label for="productos">(P)Seleccione producto:</label><br>
                <input list="suggestionList" id="productos" wire:model="selectpro" class="form-control" wire:change="changeEvent">
                <datalist id="suggestionList">
                    @foreach ($productos as $value)
                        <option value="{{ $value->codigo }}">{{ $value->nombre }}</option>
                    @endforeach
                </datalist><br>
    		</div>
    	</div>
        <div class="row">
            <div class="col-md-12 table-responsive table-striped">
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
                    <tbody>
                        @php $subtotal=0; @endphp
                        @foreach($prod_cargados as $prod)
							<tr>
								<td>{{$prod['codigo']}}</td>
								<td>{{$prod['nombre']}}</td>
								<td>
									<input type="number" class="form-control" value="{{$prod['cantidad']}}" wire:change="changecantidad($event.target.value,{{$prod['id']}})">
								</td>
								<td>
                                    @if($prod['nombre']=="varios")
								        <input type="number" class="form-control" value="{{$prod['precio']}}" wire:change="changeprecio($event.target.value,{{$prod['id']}})">
                                    @else
                                        {{$prod['precio']}}
                                    @endif
								</td>
								<td>{{$prod['precio']*$prod['cantidad']}}</td>
								<td><button type="button" class="btn btn-danger" wire:click="deleteitem({{$prod['id']}})"><i class="far fa-trash-alt"></i></button></td>
							</tr>
							@php $subtotal+=$prod['precio']*$prod['cantidad']; @endphp
						@endforeach
                    </tbody>
                </table><hr>
            </div> 
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <p><b style="font-size: 26px;">SubTotal: </b><span id="subtotal" style="font-size: 26px;">{{$subtotal}}</span></p>
                <p><b style="font-size: 26px;">Descuento: </b><span id="descuento" style="font-size: 26px;">{{ $descuento }}</span></p>
                <p><b style="font-size: 26px;">Total: </b><span id="total" style="font-size: 26px;">{{$subtotal-$descuento}}</span></p>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">(F)Efectivo</span>
                    <div class="input-group-append">
                        <input type="number" min="50" class="form-control" wire:model="efectivo" id="efectivo" placeholder="Ingrese efectivo" required>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
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
                                    <label for="exampleInputPassword1">RUC/CI</label>
                                    <input type="text" class="form-control" wire:model="ci" id="exampleInputPassword1" placeholder="RUC/CI">
                                    @error('ci') <span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div> 
                        </div>  
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    @section('adminlte_js')
        <script>
            $('#cliente_id').select2();
            $( "#cliente_id").select2('open');
            $(document).keypress(function(e){
                console.log(e.charCode);
                if(e.charCode == 83){ 
                    $( "#cliente_id").select2('open');
                }else if(e.charCode == 67){
                    $('#crearcliente').click();
                }else if(e.charCode == 86){
                    $('#credito').click();
                }else if(e.charCode == 68){
                    $('#descuento').focus();
                }else if(e.charCode == 80){
                    $('#productos').focus();
                    setTimeout(function() {
                        $("#productos").val('');
                    }, 5);
                }else if(e.charCode == 70){
                    $('#efectivo').focus();
                }
            });

            $('#cliente_id').on('change', function (e) {
                var data = $('#cliente_id').select2("val");
                @this.set('cliente_id', data);
            });

            Livewire.on('usuario', postId => {
                var o = $("<option/>", {value: postId["id"], text: postId["nombre"]+" "+postId["nombre"]});
                $('#cliente_id').append(o);
                $('#cliente_id option[value="' + postId["id"] + '"]').prop('selected',true);
                $('#cliente_id').trigger('change');
                $('#exampleModalCenter').modal('hide');
            });
        </script>
    @stop
</div>