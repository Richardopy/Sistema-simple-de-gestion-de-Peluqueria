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
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Contact <span>Information</span></h2>
				<ul class="con_inner_text">
					<li><span class="fa fa-map-marker" aria-hidden="true"></span>1234k Avenue, 4th block, <label> New York City.</label></li>
					<li><span class="fa fa-envelope-o" aria-hidden="true"></span> <a href="mailto:info@example.com">info@example.com</a></li>
					<li><span class="fa fa-phone" aria-hidden="true"></span> +1234 567 567</li>
				</ul>

				<ul class="social_agileinfo">
					<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
				</ul>
			</div>
			<div class="col-md-4 w3layouts_footer_grid">
				<h2>Subscribe <span>Newsletter</span></h2>
				<p>By subscribing to our mailing list you will always get latest news from us.</p>
				<form action="#" method="post">
					<input type="email" name="Email" placeholder="Enter your email..." required="">
					<button class="btn1"><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
					<div class="clearfix"> </div>
				</form>
			</div>
			<div class="col-md-4 w3layouts_footer_grid">
				<h3>Recent <span>Works</span></h3>
				<ul class="con_inner_text midimg">
					<li><a href="#"><img src="{{asset('frontend/images/p2.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p3.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p4.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p5.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p6.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p7.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p8.jpg')}}" alt="" class="img-responsive" /></a></li>
					<li><a href="#"><img src="{{asset('frontend/images/p9.jpg')}}" alt="" class="img-responsive" /></a></li>
				</ul>

			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<p class="copyright">© 2017 Beauty Salon. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
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
										<tr>
											<td scope="row" data-label="Producto"><img src="{{ asset('/images/productos/'.$value->attributes->urlfoto) }}" style="width: 30px;border-radius: 10px;">{{ $value->name }}</td>
											<td data-label="Precio">{{ $value->price }}</td>
											<td data-label="Acciones"><button class="btn btn-danger" wire:click="deletecarrito({{ $value->id }})"><i class="fa fa-times-circle"></i></button></td>
										</tr>
										@php
											$total+=$value->price;
										@endphp
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
			        <button type="button" class="btn btn-primary">Ver Carrito</button>
		      	</div>
		    </div>
	  	</div>
	</div>
</div>
