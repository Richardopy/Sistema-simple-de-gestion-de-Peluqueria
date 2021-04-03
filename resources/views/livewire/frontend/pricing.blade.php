<div>
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
				@if ($limite == 2)
					<div class="col-md-12">
			              <input wire:model="search" class="form-control" type="search" placeholder="Buscar producto" style="border: 1px solid #DCDCDC;">
			        </div>
				@endif
			</div>
			<div class="row">
				@foreach ($productos as $value)
					<div class="col-sm-4 d-flex pb-3 team1">
						<div class="card card-block" style="border-radius: 20px;margin-top:10px;box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);">
							<div class="portfolio-hover2">
								<img src="/images/productos/{{ $value->foto }}" class="zoom-img" alt="">
							</div><br>
							<h4 align="center">{{$value->nombre }}</h4><hr>
							@if ($value->oferta)
								<h5 align="center"><strike style="color:red;">{{$value->precio }}</strike> | {{ $value->oferta }} <span class="sup">₲</span> </h5>
							@else
								<h5 align="center">{{$value->precio }}<span class="sup">₲</span> </h5>
							@endif
							<center><br>
							@if (in_array($value->id, Cart::getContent()->pluck('id')->toArray()))
								<button type="button" class="btn btn-outline-success"><i class="fa fa-check-circle-o"></i> Agregado al carrito</button>
							@else
								<button class="btn btn-warning" wire:click="addcarrito({{ $value->id }})"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
							@endif	
							</center><br>
						</div>
					</div>
				@endforeach	
				@if ($limite == 1)
					<div class="col-md-12" align="center">
						<div class="more">
							<a href="{{ url('/productos')}}">Ver más productos</a>
						</div>
					</div>
				@else
					<div class="col-md-12" align="center">
						{{ $productos->links() }}
					</div>
				@endif
			</div>
			
			<div class="clearfix"> </div>
		</div>

	</div>
</div>

