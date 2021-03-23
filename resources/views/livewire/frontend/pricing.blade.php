<div>
	<div class="w3ls-section wthree-pricing" id="pricing">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Productos <span>Disponibles</span></h3>
				<p>Texto genérico - Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico -Texto genérico</p>
			</div>
			<div class="pricing-grids-info">
				@foreach ($productos as $value)
					<div class="pricing-grid grid-one">
						<div class="w3ls-top">
							<h3>{{$value->nombre }}</h3>
						</div>
						<div class="area-img" style="background: url(/images/productos/{{ $value->foto }})no-repeat 0px 0px;">
						</div>
						<div class="w3ls-bottom">
							<ul class="count">
								<li><?= $value->description ?></li>
							</ul>
							<h4>{{$value->precio }}<span class="sup">₲</span> </h4>
							<div class="more">
								<a href="{{ asset('frontend/contact.html')}}">Comprar</a>
							</div>
						</div>
					</div>
				@endforeach	
			</div>
				<div class="clearfix"> </div>
</div>
