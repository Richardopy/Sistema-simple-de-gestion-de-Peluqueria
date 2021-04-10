<div>
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
			<h3 class="w3l_header">Carrito <span>de Servicios</span></h3>
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
					      	<th scope="col">Acciones</th>
					    </tr>
					</thead>
					<tbody>
						@php
							$total=0;
							$cartCollection = Cart::session($sesionservicio)->getContent();
        					$cart = $cartCollection->sort();
						@endphp 
						@foreach ($cart as $value)
							<tr>
								<td scope="row" data-label="Producto"><img src="{{ asset('/images/servicios/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
								<td data-label="Precio">{{ $value->price }}</td>
								<td data-label="Cantidad">
									<button class="btn btn-success" wire:click="cantidad({{ $value->id }}, -1)"><i class="fa fa-minus-circle"></i></button>
									<b style="padding: 5px">{{ $value->quantity }}</b>
									<button class="btn btn-success" wire:click="cantidad({{ $value->id }}, 1)"><i class="fa fa-plus-square"></i></button></td>
								<td data-label="Subtotal">{{ $value->price*$value->quantity }}</td>
								<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarrito({{ $value->id }})"><i class="fa fa-times-circle"></i></button></td>
							</tr>
							@php
								$total+=$value->price*$value->quantity;
							@endphp
						@endforeach
						<tr>
							<td colspan="4" style="text-align: left !important;"><b>Total:</b></td>
							<td>{{ $total }} ₲</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
		      	<div class="col-12" align="center">
			        <a href="{{ url('comprar') }}"><button type="button" class="btn btn-success"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Confirmar datos para comprar servicio</button></a><br><br>
		      	</div>
	      	</div>
		@else
			El carrito está vacío <br><br><br>
		@endif
    </div>
</div>
