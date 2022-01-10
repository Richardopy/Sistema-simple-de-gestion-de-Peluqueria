<div>
	<div class="footer">
		<style>
			table {
			  border: 1px solid #ccc;
			  border-collapse: collapse;
			  margin: 0;
			  padding: 0;
			  width: 100%;
			  table-layout: fixed;
			}

			table caption {
			  font-size: 1.5em;
			  margin: .5em 0 .75em;
			}

			table tr {
			  background-color: #f8f8f8;
			  border: 1px solid #ddd;
			  padding: .35em;
			}

			table th,
			table td {
			  padding: .625em;
			  text-align: center;
			}

			table th {
			  font-size: .85em;
			  letter-spacing: .1em;
			  text-transform: uppercase;
			}

			@media screen and (max-width: 600px) {
			  table {
			    border: 0;
			  }

			  table caption {
			    font-size: 1.3em;
			  }
			  
			  table thead {
			    border: none;
			    clip: rect(0 0 0 0);
			    height: 1px;
			    margin: -1px;
			    overflow: hidden;
			    padding: 0;
			    position: absolute;
			    width: 1px;
			  }
			  
			  table tr {
			    border-bottom: 3px solid #ddd;
			    display: block;
			    margin-bottom: .625em;
			  }
			  
			  table td {
			    border-bottom: 1px solid #ddd;
			    display: block;
			    font-size: .8em;
			    text-align: right;
			  }
			  
			  table td::before {
			    /*
			    * aria-label has no advantage, it won't be read inside a table
			    content: attr(aria-label);
			    */
			    content: attr(data-label);
			    float: left;
			    font-weight: bold;
			    text-transform: uppercase;
			  }
			  
			  table td:last-child {
			    border-bottom: 0;
			  }
			}
		</style>
		<div class="container">
			<div class="f-bg-w3l">
				<div class="col-md-6 w3layouts_footer_grid">
					<h2>Información de <span>Contacto</span></h2>
					<ul class="con_inner_text">
						<li><span class="fa fa-map-marker" aria-hidden="true"></span>{{ $empresa->direccion }}</li>
						<li><span class="fa fa-envelope-o" aria-hidden="true"></span> <a href="mailto:{{ $empresa->correo }}">{{ $empresa->correo }}</a></li>
						<li><span class="fa fa-phone" aria-hidden="true"></span> {{ $empresa->telefono1 }}</li>
					</ul>
					<ul class="social_agileinfo">
						@if(isset($empresa->facebook))
							<li><a href="{{ $empresa->facebook }}" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
						@endif
						@if(isset($empresa->twitter))
							<li><a href="{{ $empresa->twitter }}" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
						@endif
						@if(isset($empresa->instagram))
							<li><a href="{{ $empresa->instagram }}" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
						@endif
					</ul>
				</div>
				<div class="col-md-6 w3layouts_footer_grid btn-group-vertical" role="group" aria-label="Vertical button group">
					<h2>Enlaces <span>Importantes</span></h2>
					<li style="color:#ffcc54;"><a href="{{ url('/quienessomos') }}" style="text-decoration: none !important;color:white !important;">Quienes Somos</a></li>
					<li style="color:#ffcc54;"><a href="{{ url('/productos') }}" style="text-decoration: none !important;color:white;">Productos</a></li>
					<li style="color:#ffcc54;"><a href="{{ url('/servicios') }}" style="text-decoration: none !important;color:white;">Servicios</a></li>
					<li style="color:#ffcc54;"><a href="{{ url('/contacto') }}" style="text-decoration: none !important;color:white;">Contacto</a></li>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<<<<<<< HEAD
		<p class="copyright">{{ $empresa->nombre }} | Desarrollado por <a href="http://techcirclepy.com/" target="_blank">TechCircle</a></p>
		<!-- Modal Carrito -->
		<div class="modal fade" wire:init="openModal" wire:ignore.self id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  	<div class="modal-dialog modal-dialog-centered" role="document">
		    	<div class="modal-content">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLongTitle">Carrito de Compras <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button></h5>
			      	</div>
			      	<div class="modal-body">
			        	@if (count(Cart::getContent()))
			        		<div class="row">
	  							<table class="table table-striped table-hover">
	  								<thead>
									    <tr>
									      	<th scope="col">Producto</th>
									      	<th scope="col">Precio</th>
									      	<th scope="col">Acciones</th>
									    </tr>
									</thead>
									<tbody>
										@php
											$total=0;
										@endphp
										@foreach (Cart::getContent() as $value)
											@if ($value->attributes->tipo == "producto")
												<tr>
													<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
													<td data-label="Precio">{{ $value->price }}</td>
													<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarrito('{{ $value->id }}')"><i class="fa fa-times-circle"></i></button></td>
												</tr>
												@php
													$total+=$value->price*$value->quantity;
												@endphp
											@endif
										@endforeach
										<tr>
											<td colspan="2"><b>Total:</b></td>
											<td>{{ $total }} ₲</td>
										</tr>
									</tbody>
								</table>
							</div>
						@else
							El carrito está vacío
						@endif
			      	</div>
			      	<div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir comprando</button>
				        <a href="{{ url('/carrito') }}"><button type="button" class="btn btn-primary">Ver Carrito</button></a>
			      	</div>
			    </div>
		  	</div>
		</div>
		<p>
			<button class="btn btn-warning" id="carrito" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-shopping-cart carritocontenido" aria-hidden="true"></span> 
				@php
					$contador=0;
				@endphp
				@foreach (Cart::getContent() as $value)
					@if ($value->attributes->tipo == "producto")
						@php
							$contador+=1;
						@endphp
					@endif
				@endforeach
				@if ($contador > 0)
					<span class="badge badge-pill badge-success carritocontenido">
						{{ $contador }}
					</span>
				@endif
			</button>
		</p>
	</div>
</div>