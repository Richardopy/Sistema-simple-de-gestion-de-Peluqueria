<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contacto</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Beauty Salon Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta Tags -->
	<!-- Style Sheets -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" media="all">
	<!--// Bootstrap-CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}" type="text/css" media="all">
	<!--// Font-Awesome-CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}" type="text/css" media="all">

	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}" type="text/css" media="all">

	<link rel="stylesheet" href="{{ asset('frontend/css/flexslider.css') }}" type="text/css" media="screen" property="" />
	<!--// Owl-Carousel-CSS -->
	<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- //Style Sheets -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Khula:300,400,600,700,800" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>

	<div class="banner jarallax" id="home">
		<img class="jarallax-img" src="{{ asset('frontend/images/22.jpg')}}" alt="">

		<livewire:info />

		<livewire:navbar />
	
	</div>

<div class="contact">
	<div class="container">
		<div class="wthree_head_section">
			<h3 class="w3l_header">Contacta con profesionales <span>Ya!</span></h3>
			<p>Cumplite los caprichos con una limpieza facial o celebrando una ocasión especial, aromaterapia, nuestro centro de belleza
y los servicios de cuidado de la piel se adaptarán a todas las necesidades de belleza.</p>
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
					<form action="#" method="post">
					<div class="col-md-5 col-sm-5 contact-left agileits-w3layouts">
					
						<div class="f-control"> 
							<label class="header">Nombre Completo <span>:</span></label>
							<input type="text" name="First Name" placeholder="Escriba su nombre" required="">
						</div>
						
						<div class="f-control">
							<label class="header">Celular <span>:</span></label>
							<input type="text" name="Number" placeholder="Número de Celular" required="" >
						</div>	
						<!-- <input type="text" class="email" name="Last Name" placeholder="Last Name" required=""> -->
					</div> 
					<div class="col-md-7 col-sm-7 contact-right agileits-w3layouts">
						
							<label class="header">Mensaje <span>:</span></label>
							<textarea name="Message" placeholder="Escriba aquí su mensaje" required=""></textarea>
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
		<livewire:footer />
				<div class="clearfix"> </div>
			</div>
			</div>
	</div>
	<!-- //footer -->
	</script>
	<!-- //Owl-Carousel-JavaScript -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //smooth scrolling -->
	<script type='text/javascript' src="{{asset('frontend/js/jquery-2.2.3.min.js')}}"></script>
	<!-- start-smoth-scrolling -->


	<script src="{{asset('frontend/js/jarallax.js')}}"></script>

	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<!-- flexSlider -->
	<script defer src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->

	<!-- Owl-Carousel-JavaScript -->
	<script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({
				items: 2,
				lazyLoad: true,
				autoPlay: false,
				pagination: true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->
	<script type="text/javascript" src="{{ asset('frontend/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->

	<!-- stats -->
	<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.countup.js')}}"></script>
	<script>
		$('.counter').countUp();
	</script>
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
	<!-- //for bootstrap working -->
	@livewireScripts
</body>
</html>