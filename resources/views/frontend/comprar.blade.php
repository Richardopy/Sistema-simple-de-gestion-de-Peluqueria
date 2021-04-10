@extends('layouts.frontend')
@section('contenido')
	@include("funciones.horariodeatencion")
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
    <div class="container mt-3"><br>
		<div class="wthree_head_section">
			<h3 class="w3l_header">Finalizar <span>Compra</span></h3>
		</div>
		@php
			$carro="producto";
		@endphp
    	@if (count(Cart::session($carro)->getContent()))
    		{!! Form::open(array('url'=>'enviarpedido','method'=>'POST','autocomplete'=>'off')) !!}
    		{{Form::token()}}
    		<div class="row">
				<table class="table table-striped table-hover">
					<thead>
				    <tr>
				      	<th scope="col">Producto</th>
				      	<th scope="col">Precio</th>
				      	<th scope="col">Cantidad</th>
				      	<th scope="col">Subtotal</th>
				    </tr>
				</thead>
					<tbody>
						@php
							$total=0;
							$cartCollection = Cart::session($carro)->getContent();
        					$cart = $cartCollection->sort();
						@endphp 
						@foreach ($cart as $value)
							@if ($value->attributes->tipo == "producto")
								<input type="hidden" name="producto_id[]" value="{{ $value->id }}">
								<input type="hidden" name="cantidad[]" value="{{ $value->quantity }}">
								<input type="hidden" name="precio[]" value="{{ $value->price }}">
								<tr>
									<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
									<td data-label="Precio">{{ $value->price }}</td>
									<td data-label="Cantidad">{{ $value->quantity }}</td>
									<td data-label="Subtotal">{{ $value->price*$value->quantity }}</td>
								</tr>
								@php
									$total+=$value->price*$value->quantity;
								@endphp
							@endif
						@endforeach
						<tr>
							<td colspan="4">
								<div class="fade" style="text-align: left !important;" id="mostrardelivery">
									<b>Delivery:</b> 
									<span style="float: right" id="costrarcostodelivery">
										@if ($empresa->costodelivery == "gratis")
					                    	Gratis
					                    @elseif ($empresa->costodelivery == "fijo")
					                    	{{ $empresa->cotizaciondelivery }} ₲
					                    @elseif ($empresa->costodelivery == "kilometro")
					                    	{{ $empresa->cotizaciondelivery }} ₲
					                    @elseif ($empresa->costodelivery == "cotizar")
					                    	A cotizar
					                    @endif
					                </span>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align: left !important;"><b>Total:</b> <span style="float: right" id="totalapagar">{{ $total }} ₲</span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
		      	<div class="col-12">
		      		<b>Método de entrega: </b><span id="metododeentrega"></span><br><br>
		      	</div>
		    </div>
		    <input type="hidden" id="metodoentrega" name="metodoentrega" />
		    <input type="hidden" id="id_lat" name="latitud" />
		    <input type="hidden" id="id_lng" name="longitud" />
		    <input type="hidden" id="costodelivery" name="costodelivery" value="0" />
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="alert alert-danger fade" style="display: none;" role="alert" id="error"></div>
		    	</div>
		    	<div class="col-md-12">
		    		@php
		    			$horario = calcularhorario($empresa);
		    		@endphp
		    		@if ($horario == "no")
		    			<div class="alert alert-danger" role="alert">
		    				<b>¡Atención!</b> Estamos fuera del horario de atención al cliente, apenas volvamos le responderemos, ¡Gracias por su comprensión!
		    			</div>
		    		@endif
		    	</div>
		    </div>	
			<div class="row">
		      	<div class="col-12" align="center">
			        <button type="submit" class="btn btn-success"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Comprar</button><br><br>
		      	</div>
	      	</div>
	      	{!!Form::close()!!}
		@else
			El carrito está vacío <br><br><br>
		@endif
    </div>
    <div class="modal fade" id="modoentrega" tabindex="-1" role="dialog" aria-labelledby="modoentrega" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header" align="center">
	        		<h5>Seleccione método de entrega</h5>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
		        		<div class="col-md-6" align="center" onclick="entienda();">
		        			<div class="modoretiro">
								<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
								<br><br>
								<h3>Retirar de la tienda</h3>
							</div>
						</div>
						<div class="col-md-6" align="center" onclick="delivery();">
							<div class="modoretiro">
								<span class="glyphicon glyphicon-road" aria-hidden="true"></span>
								<br><br>
								<h3>Delivery</h3>
							</div>
						</div>
						<div class="col-md-12 fade" style="display: none;" id="mostrarmapa">
							<div class="form-group"><br>
				                <label><b>Marcar ubicación de envio:</b></label>
				                <style type="text/css">
				                    #mapa{border:1px solid #999;height:200px}
				                    #mapa img{max-width:none}
				                </style>
				                <div id="mapa"></div>
				            </div>
				            <center><button type="button" class="btn btn-success" onclick="calculardelivery();" data-dismiss="modal">Listo</button></center>
						</div>
		        	</div>	
		      	</div>
		    </div>
	  	</div>
	</div>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback"></script>
	<script src="{{ asset('frontend/js/makermaps.js')}}" charset="utf-8"></script>
	<script src="{{ asset('frontend/js/maps_delivery.js')}}" charset="utf-8"></script>
	<script>
		if (document.addEventListener) {
		   document.addEventListener("DOMContentLoaded", inicializar, false);
		}

		function inicializar(){
		   $('#modoentrega').modal('show');
		}  
		function entienda(){
		   $('#modoentrega').modal('hide');
		   $('#metododeentrega').text('Retiro en tienda');
		   $('#metodoentrega').val(1);
		} 
		function delivery(){
			$('#metodoentrega').val(2);
		   	$('#metododeentrega').text('Por delivery');
			var lat = -25.386088901774805;
			var lng = -57.14114824436649;
			if (navigator.geolocation){
				navigator.geolocation.getCurrentPosition(getPosition, getError);
			}else {
				initialize(lat, lng); 
			}
			function getPosition(position){
				var lat = position.coords.latitude;
				var lng = position.coords.longitude;
				initialize(lat, lng);
			}
			function getError(err){
				initialize(lat, lng);
			}
			$('#mostrarmapa').removeClass('fade').addClass('show'); 
			$('#mostrardelivery').removeClass('fade').addClass('show'); 
		} 
		function calculardelivery(){
			var latitud = $('#id_lat').val();
			var longitud = $('#id_lng').val();
			@if ($empresa->costodelivery == 'kilometro' || $empresa->costodelivery == 'fijo')
				calculartiempo(latitud,longitud,'{{ $empresa->costodelivery }}','{{ $empresa->cotizaciondelivery }}','{{ $empresa->limitedelivery }}','{{ $total }}');
			@else
				calculartiempo(latitud,longitud,'{{ $empresa->costodelivery }}','0','{{ $empresa->limitedelivery }}','{{ $total }}');
			@endif
			
		}

	</script>
@stop