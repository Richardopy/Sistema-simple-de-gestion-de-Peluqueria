<div>
	<div class="about">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Tus <span>Productos</span></h3>
			</div>
			<div class="ab-agile">
				<div class="col-md-12 aboutleft" align="center">
					<h3 style="color: #525252;">{{ Auth::user()->name }},estos son tus productos </h3>
					<p class="para1"></p>
				</div>	
				<div class="clearfix"></div>
				<div class="row">
				    @if ($cabecera->count())
					    <table class="table">
					        <thead>
					            <tr>
					                <th>Fecha de Compra</th>
					                <th>Tipo de entrega</th>
					                <th>Estado</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($cabecera as $value)
					                <tr>
					                	<td data-label="Fecha de Compra"><button class="btn btn-success" wire:click="leer({{ $value->id }})" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button> {{ $value->created_at }}</td>
					                	<td data-label="Tipo de entrega">
					                		@if ($value->tipoentrega == 1)
					                			Entrega en tienda
					                		@else
					                			Delivery
					                		@endif
					                	</td>
					                	<td data-label="Estado">
					                		@if ($value->estado == 0)
					                			<span class="badge badge-pill badge-danger">Solicitud realizada</span>
					                		@elseif($value->estado == 1)
					                			<span class="badge badge-pill badge-warning">En proceso</span>
					                		@elseif($value->estado == 2)
					                			<span class="badge badge-pill badge-success">Entregado</span>
					                		@endif
					                	</td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
				    @endif
				    <!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  	<div class="modal-dialog" role="document">
					    	<div class="modal-content">
					     		<div class="modal-header">
					        		<h5 class="modal-title" id="exampleModalLabel">Productos comprados
					        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          				<span aria-hidden="true">&times;</span>
					        			</button>
					        		</h5>
					      		</div>
					      		<div class="modal-body">

					      			<table class="table">
								        <thead>
								            <tr>
								                <th>Producto</th>
								                <th>Cantidad</th>
								                <th>Precio</th>
								            </tr>
								        </thead>
								        <tbody>
								        	@if(isset($productos))
									        	@php
									        		$total=0;
									        	@endphp
									            @foreach ($productos as $element)
									                <tr>
									                	<td data-label="Producto">{{ $element->nombre }}</td>
									                	<td data-label="Cantidad">{{ $element->cantidad }}</td>
									                	<td data-label="Precio">{{ $element->precio }}</td>
									                </tr>
									                @php
									                	$total+=$element->precio*$element->cantidad;
									                @endphp
									            @endforeach
									            <tr>
									            	<td colspan="3" data-label="Total"><b>{{ $total }}</b></td>
									            </tr>
						        			@endif
								        </tbody>
								    </table>
					      		</div>
					      		<div class="modal-footer">
					        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					      		</div>
					    	</div>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

