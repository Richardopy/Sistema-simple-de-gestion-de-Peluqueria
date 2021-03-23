<div>
		<div class="practice-areas">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Nuestros <span>Servicios</span></h3>
				<p>Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico</p>
			</div>
			<div class="area-main">
				@php
					$cont=1;
				@endphp
				@foreach ($servicios as $value)
					<div class="col-md-6 area-inner">
						<div class="area-img" style="background: url(/images/servicios/{{ $value->foto }})no-repeat 0px 0px;">
						</div>
						<div class="area-right p{{ $cont }}">
							<h5>{{$value->nombre }}</h5>
							<p class="para-w3-agile"><?= $value->description ?></p>
						</div>
					</div>
					@if ($cont%2==0)
						</div>
						<div class="area-main">
					@endif
					@php
						$cont+=1;
					@endphp
				@endforeach
			</div>
		</div>
	</div>
</div>
