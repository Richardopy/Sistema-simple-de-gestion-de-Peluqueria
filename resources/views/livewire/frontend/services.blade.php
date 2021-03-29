<style>
	.portfolio-hover{
        height: 300px;
        background: #FFF;
        overflow: hidden;
    }
    .portfolio-hover img{
        width: 112%;
        height: auto;
        margin-left: -15px;
    }
    @supports(object-fit: cover){
        .portfolio-hover img{
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }
    }
</style>
<div class="practice-areas">
	<div class="container">
		<div class="wthree_head_section">
			<h3 class="w3l_header">Nuestros <span>Servicios</span></h3>
			<p>Se destacan en el mercado por ser realizados por profesionales cualificados. Estilos vanguardistas y elegantes lo encontrarás aquí.
			¿Quieres hacerte uno de nuestros tratamientos? ¡No esperes ni un minuto! Reserva tu cita ya</p>
		</div>
		<div class="row">
			@php
				$cont=1;
			@endphp
			@foreach ($servicios as $value)
				@if ($cont > 2)
					<div class="col-md-6">
						<div class="row">
							<div class="p{{ $cont }} col-md-6" style="padding: 20px;min-height: 300px !important;">
								<h3 align="center">{{$value->nombre }}</h3><hr>
								<p class="para-w3-agile"><?= $value->description ?></p>
								<div style="position: absolute;bottom:10px;right:10px;"><button class="btn btn-warning">Solicitar cita</button></div>
							</div>
							<div class="col-md-6 portfolio-hover" style="min-height: 300px !important;">
								<img src="/images/servicios/{{ $value->foto }}" class="zoom-img" height="300px" alt="">
							</div>
						</div>
					</div>
				@else
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 portfolio-hover" style="min-height: 300px !important;">
								<img src="/images/servicios/{{ $value->foto }}" class="zoom-img" height="300px" alt="">
							</div>
							<div class="p{{ $cont }} col-md-6" style="padding: 20px;min-height: 300px !important;">
								<h3 align="center">{{$value->nombre }}</h3><hr>
								<p class="para-w3-agile"><?= $value->description ?></p>
								<div style="position: absolute;bottom:10px;right:10px;"><button class="btn btn-warning">Solicitar cita</button></div>
							</div>
						</div>
					</div>
				@endif
				@php
					$cont+=1;
				@endphp
			@endforeach
			<div class="col-md-12" align="center">
				<div class="more">
					<a href="{{ url('/servicios')}}">Ver más servicios</a>
				</div>
			</div>
		</div>
	</div>
</div>
