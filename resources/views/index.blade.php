<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Peluqueria</title>
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
	<!--// web-fonts -->

	@livewireStyles

</head>
<body>
	<!-- banner -->
	<div class="banner jarallax" id="home">
		<img class="jarallax-img" src="{{ asset('frontend/images/22.jpg')}}" alt="">

		<livewire:info />

		<!-- navigation -->
		<livewire:navbar />

				</nav>
			</div>
		</div>
		<!-- /.navbar-collapse -->
		<livewire:banners />
		<!-- //navigation -->
	    <!-- //banner -->
		<!-- Latest News -->
		<livewire:services />
		<!-- //Latest News -->
		<!-- wthree-mid -->
	    <livewire:ad />
		<!-- //wthree-mid -->
		<!-- pricing -->
		<livewire:pricing />

		<!--End-slider-script-->
			</div>
		</div>
	</div>
		<!--//pricing-->
		<!-- counter -->
		<livewire:statistics />
		<!-- //counter -->
		<!-- Clients -->
		<livewire:customer-review />

			<!--// Owl-Carousel -->
		</div>
	</div>
	<!--// Clients -->
	<!-- footer -->
			<livewire:footer />

	<!-- //footer -->

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

	<!--js for bootstrap working-->
	<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	@livewireScripts
</body>

</html>