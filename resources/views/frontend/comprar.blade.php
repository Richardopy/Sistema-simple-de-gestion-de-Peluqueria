@extends('layouts.frontend')
@section('contenido')
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
    	@if (count(Cart::getContent()))
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
							$cartCollection = Cart::getContent();
        					$cart = $cartCollection->sort();
						@endphp 
						@foreach ($cart as $value)
							<tr>
								<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
								<td data-label="Precio">{{ $value->price }}</td>
								<td data-label="Cantidad">{{ $value->quantity }}</td>
								<td data-label="Subtotal">{{ $value->price*$value->quantity }}</td>
							</tr>
							@php
								$total+=$value->price*$value->quantity;
							@endphp
						@endforeach
						<tr>
							<td colspan="4" style="text-align: left !important;"><b>Total:</b> <span style="float: right">{{ $total }} ₲</span></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
		      	<div class="col-12" align="center">
			        <button type="button" class="btn btn-success"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Comprar</button><br><br>
		      	</div>
	      	</div>
		@else
			El carrito está vacío <br><br><br>
		@endif
    </div>
    <div class="modal fade" id="modoentrega" tabindex="-1" role="dialog" aria-labelledby="modoentrega" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalLongTitle">Seleccione método de entrega <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button></h5>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
		        		<div class="col-md-6" align="center">
		        			<div class="modoretiro">
								<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
								<br><br>
								<h3>Retirar de la tienda</h3>
							</div>
						</div>
						<div class="col-md-6" align="center">
							<div class="modoretiro">
								<span class="glyphicon glyphicon-road" aria-hidden="true"></span>
								<br><br>
								<h3>Delivery</h3>
							</div>
						</div>
		        	</div>	
		      	</div>
		      	<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir comprando</button>
			        <a href="{{ url('/carrito') }}"><button type="button" class="btn btn-primary">Ver Carrito</button></a>
		      	</div>
		    </div>
	  	</div>
	</div>

	<script>
		if (document.addEventListener) {
		   document.addEventListener("DOMContentLoaded", inicializar, false);
		}

		function inicializar(){
		   $('#modoentrega').modal('show');
		}  
	</script>
@stop