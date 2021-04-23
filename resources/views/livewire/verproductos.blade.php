<div>
	<div class="about">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Tus <span>Productos</span></h3>
			</div>
			<div class="ab-agile">
				<div class="col-12 aboutleft" align="center">
					<h3 style="color: #525252;">{{ Auth::user()->name }},estos son tus productos </h3>
					<p class="para1"></p>
				</div>	
				<div class="clearfix"></div>
				<div class="row">
				    @if ($cabecera->count())
				    	<div class="row" align="center">
				    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
				    			<b>Fecha de Compra</b>
				    		</div>
				    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
				    			<b>Tipo de entrega</b>
				    		</div>
				    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
				    			<b>Estado</b>
				    		</div>
				    	</div>
				    	@foreach ($cabecera as $value)
					    	<div id="accordion">
							  	<div class="card">
							    	<div class="card-header" id="heading{{ $value->id }}">
							      		<h5 class="mb-0">
						          			<div class="row collapsed" data-toggle="collapse" data-target="#collapse{{ $value->id }}" aria-expanded="false" aria-controls="collapse{{ $value->id }}" align="center">
									    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
									    			{{ $value->created_at }}
									    		</div>
									    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
									    			@if ($value->tipoentrega == 1)
							                			Entrega en tienda
							                		@else
							                			Delivery
							                		@endif
									    		</div>
									    		<div class="col-4" style="border: 1px solid #525252;padding: 10px;">
									    			@if ($value->estado == 0)
							                			Solicitud realizada
							                		@elseif($value->estado == 1)
							                			En proceso
							                		@elseif($value->estado == 2)
							                			Entregado
							                		@endif
									    		</div>
									    	</div>
							      		</h5>
							    	</div>

							    	<div id="collapse{{ $value->id }}" class="collapse" aria-labelledby="heading{{ $value->id }}" data-parent="#accordion" style="padding: 20px;">
							      		<div class="card-body">
							        		Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
							      		</div>
							    	</div>
							  	</div>
							</div>
					    @endforeach
				    @endif
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</div>

