<div>
	<div class="container">
		<div class="row">
        	<div class="col-md-12">
              	<input wire:model="search" class="form-control" type="search" placeholder="Buscar ..."> <hr>
        	</div>
		</div>
    	<div class="row">
        	@if ($encabezado->count())
		        <table class="table">
		            <thead>
		                <tr>
		                    <th>ID</th>
		                    <th>Cliente</th>
		                    <th>Fecha</th>
		                    <th>Vendedor</th>
		                    <th>Acciones</th>

		                </tr>
		            </thead>
		            <tbody>

		                @foreach ($encabezado as $value)
		                    <tr>
		                        <td>{{ $value->id }}</td>
		                        <td>{{ $value->name }}</td>
		                        <td>{{ $value->created_at }}</td>
		                        <td>{{ $value->vendedor }}</td>
		                        <td>
			                        <button class="btn btn-sm btn-info" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModalleer"><i class="fas fa-eye"></i></button>
			                        <button class="btn btn-sm btn-success" wire:click="leer({{ $value->id }})" onclick="printer();"><i class="fas fa-print"></i></button> 
			                        @if($value->estado == 1)
			                        	<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{ $value->id }}"><i class="far fa-trash-alt"></i></button>
			                        @else
			                        	<span class="badge badge-danger">Anulado</span>
			                        @endif

									<!-- Modal -->
									<div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Anular comprobante</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        <p>¿Realmente quiere eliminar el comprobante?</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									        <button type="button" wire:click="delete({{ $value->id }})" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
									      </div>
									    </div>
									  </div>
									</div>
		                        </td>
		                    </tr>
		                @endforeach

		            </tbody>
		        </table>
		        <div class="col-12">
		        	{{ $encabezado->links() }}
		        </div>
	        @else
	            <div class="col-12 alert alert-warning">
	                No se encuentran registros para {{ $search }}
	            </div>
	        @endif
	    </div>
    </div>
    <!-- Modal -->
   
	<div class="modal fade" id="exampleModalleer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
	    		@if(isset($comprobante) && isset($productos))
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel">Comprobante Nº {{ $comprobante->id }}</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          			<span aria-hidden="true">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body printableArea">
		      			<center><b>{{ $empresa->nombre }}</b></center>
		      			<center><b>{{ $empresa->direccion }}</b></center>
		      			<center><b>{{ $empresa->telefono1 }}</b></center><hr>
		        		<p><b>Fecha:</b> {{ $comprobante->created_at }}</p>
		        		<p><b>Cliente:</b> {{ $cliente->name }}</p>
		        		<p><b>Vendedor:</b> {{ $vendedor->name }}</p>
		        		<div class="row">
				            <div class="col-md-12 table-responsive">
				                <table class="table">
				                    <thead>
				                        <tr>
				                            <th>Producto</th>
				                            <th>Cantidad</th>
				                            <th>Precio</th>
				                            <th>Subtotal</th>
				                        </tr>
				                    </thead>
				                    <tbody>
				                    	<?php $subtotal=0; ?>
				                        @foreach ($productos as $value)
				                        	<tr>
				                        		<td>{{ $value->nombre }}</td>
				                        		<td>{{ $value->cantidad }}</td>
				                        		<td>{{ $value->precio }}</td>
				                        		<td>{{ $value->cantidad*$value->precio }}</td>
				                        	</tr>
				                        	<?php $subtotal+=$value->cantidad*$value->precio; ?>
				                        @endforeach
				                    </tbody>
				                </table><hr>
				            </div> 
				            <div class="col-md-9"></div>
				            <div class="col-md-3">
				                <p><b>SubTotal: </b>{{ $subtotal }}</p>
				                <p><b>Descuento: </b>{{ $comprobante->descuento }}</p>
				                @if ($comprobante->descuento)
				                	<p><b>Total: </b>{{ $subtotal-(($subtotal*$comprobante->descuento)/100) }}</p>
				                @else
				                	<p><b>Total: </b>{{ $subtotal }}</p>
				                @endif
				            </div>
				        </div>
		      		</div>
	      		@endif
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		      	</div>
	    	</div>
	  	</div>
	</div>

	@if(isset($_GET['vuelto']))
		<div class="modal fade" id="exampleModalvuelto" tabindex="-1" role="dialog">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLabel"></h5>
	        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	        			</button>
		      		</div>
		      		<div class="modal-body">
		        		<h1 align="center">Vuelto:</h1>
		        		<h1 align="center"><b>{{ $_GET['vuelto'] }}</b></h1>
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        		<button type="button" wire:click="leer({{ $_GET['id'] }})" onclick="printer();" class="btn btn-success" data-dismiss="modal"><i class="fas fa-print"></i> Imprimir</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
	@endif
	
</div>