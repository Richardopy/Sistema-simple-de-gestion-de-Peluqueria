<div>
	<header>
		<div class="container">
			<div class="header-bottom-agileits">
				<div class="w3-logo">
					<h1><a href="{{ url('/')}}">{{ $empresa->nombre }}</a></h1>
				</div>
				<div class="address">
					<p>{{ $empresa->direccion }}</p>
					<p class="para-y"><a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver en Maps</a></p>
				</div>
				<div class="nav-contact-w3ls">
					<a href="https://wa.me/{{ $empresa->whatsapp }}"><p>{{ $empresa->whatsapp }}<span class="fa fa-whatsapp" aria-hidden="true"></span></p></a>
					<p class="para-y"><a href="tel:{{ $empresa->telefono1 }}">{{ $empresa->telefono1 }}</a><span class="fa fa-phone" aria-hidden="true"></span></p>
					<p>
						<button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"><span class="fa fa-shopping-cart" aria-hidden="true"></span> 
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
								<span class="badge badge-pill badge-success">
									{{ $contador }}
								</span>
							@endif
						</button>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- Modal -->
</div>