@extends('layouts.frontend')
@section('contenido')

	<div class="contact">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Contacta con profesionales <span>Ya!</span></h3>
				<p>Cumplite los caprichos con una limpieza facial o celebrando una ocasión especial, aromaterapia, nuestro centro de belleza y los servicios de cuidado de la piel se adaptarán a todas las necesidades de belleza.</p>
			</div>		
			<div class="gal-btm">
				<div class="map-home">
					<div class="col-md-4 drop-pad sign-gd-two">
						<h3>Contactá con nosotros </h3>
						<ul>
							<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>{{ $empresa->direccion }}</li>
							<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>{{ $empresa->telefono1 }}</li>
							<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:{{ $empresa->correo }}">{{ $empresa->correo }}</a></li>
						</ul>
						<h3 class="connect">¡Seguinos en nuestras redes para informaciones y promociones!</h3>
						<ul class="top-links">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<div class="col-md-8 contact-w3ls">
						<form action="{{ route('enviarcorreo') }}" method="post">
							@csrf
							<div class="col-md-5 col-sm-5 contact-left agileits-w3layouts">
							
								<div class="f-control"> 
									<label class="header">Nombre Completo <span>:</span></label>
									<input type="text" name="nombre" placeholder="Escriba su nombre" required="">
								</div>
								
								<div class="f-control">
									<label class="header">Celular <span>:</span></label>
									<input type="text" name="celular" placeholder="Número de Celular" required="" >
								</div>	
								<!-- <input type="text" class="email" name="Last Name" placeholder="Last Name" required=""> -->
							</div> 
							<div class="col-md-7 col-sm-7 contact-right agileits-w3layouts">
								
									<label class="header">Mensaje <span>:</span></label>
									<textarea name="mensaje" placeholder="Escriba aquí su mensaje" required=""></textarea>
							</div>
							<div class="clearfix"> </div> 
							<input type="submit" value="Enviar">
						</form>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- //contact -->
<!-- map -->
	<div class="frame">
		<style type="text/css">
            #mapa{border:0px solid #999;height:400px; border-radius: 10px;}
        </style>
        <div id="mapa" class="shadow"></div>
        <div id="tiempo"><br><button class="btn btn-outline-success" onclick="calculartiempo({{$empresa->latitud}},{{$empresa->longitud}},'{{$empresa->nombre}}')" style="width: 100%">Calcular distancia y tiempo de llegada</button></div>
        <br><p align="center">Abrir en Google Maps <a href="https://maps.google.com/?q={{$empresa->latitud}},{{$empresa->longitud}}">Ver Instrucciones</a></p>
	</div>
<!-- //map -->
	<!-- footer -->
	<ul class="social_agileinfo">
		<li><a href="#" class="w3_facebook"><i class="fa fa-facebook"></i></a></li>
		<li><a href="#" class="w3_twitter"><i class="fa fa-twitter"></i></a></li>
		<li><a href="#" class="w3_instagram"><i class="fa fa-instagram"></i></a></li>
		<li><a href="#" class="w3_google"><i class="fa fa-google-plus"></i></a></li>
	</ul>
</div>
		
	<!-- //stats -->
<script type="text/javascript" src="{{ asset('frontend/js/maps.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHcQT0yBuaLXWdx6Mv_hAroOB0HLmNp5g&callback=Maps" async defer></script>
<script>
	function Maps(){
	    let lat = {{$empresa->latitud}};
	    let lng = {{$empresa->longitud}};
	    let empresa = '{{$empresa->nombre}}';
	    let direccion = '{{$empresa->direccion}}';
	    initMap(lat,lng,empresa,direccion);
	}        
</script>
@stop