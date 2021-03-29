
<div class="w3ls-section wthree-pricing" id="pricing">
	<style>
		.portfolio-hover2{
	        height: 300px;
	        background: #FFF;
	        overflow: hidden;
	    }
	    .portfolio-hover2 img{
	        width: 100%;
	        height: auto;
	    }
	    @supports(object-fit: cover){
	        .portfolio-hover2 img{
	            height: 100%;
	            object-fit: cover;
	            object-position: center center;
	        }
	    }
    </style>
	<div class="container mt-3">
		<div class="wthree_head_section">
			<h3 class="w3l_header">Productos <span>Disponibles</span></h3>
			<p>Nuestros productos son de marcas reconocidas a nivel mundial por sus revolucionarias fórmulas aplicadas a la belleza corporal</p>
		</div>
		<div class="row">
			@foreach ($productos as $value)
				<div class="col-sm-4 d-flex pb-3">
					<div class="card card-block" style="border-radius: 20px;margin-top:10px;box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);">
						<div class="portfolio-hover2">
							<img src="/images/productos/{{ $value->foto }}" class="zoom-img" alt="">
						</div><br>
						<h4 align="center">{{$value->nombre }}</h4><hr>
						<h5 align="center">{{$value->precio }}<span class="sup">₲</span> </h5>
						<div class="more" align="center">
							<a href="{{ asset('frontend/contact.html')}}">Comprar</a>
						</div><br>
					</div>
				</div>
			@endforeach	
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
