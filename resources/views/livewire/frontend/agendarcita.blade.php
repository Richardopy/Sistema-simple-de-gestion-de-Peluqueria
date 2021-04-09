<div>
	<div class="w3ls-section wthree-pricing">
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
				<h3 class="w3l_header">Horarios <span>Disponibles</span></h3>
			</div>
     <div class="row">
	        	@if ($empresa->lunesingreso)
	        		<div class="col-md-3">
		        		<b>Lunes:</b><br>
		        		Desde las: {{ $empresa->lunesingreso }} hrs. - hasta las {{ $empresa->lunessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->martesingreso)
	        		<div class="col-md-3">
		        		<b>Martes:</b><br>
		        		Desde las: {{ $empresa->martesingreso }} hrs. - hasta las {{ $empresa->martessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->miercolesingreso)
	        		<div class="col-md-3">
		        		<b>Miércoles:</b><br>
		        		Desde las: {{ $empresa->miercolesingreso }} hrs. - hasta las {{ $empresa->miercolessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->juevesingreso)
	        		<div class="col-md-3">
		        		<b>Jueves:</b><br>
		        		Desde las: {{ $empresa->juevesingreso }} hrs. - hasta las {{ $empresa->juevessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->viernesingreso)
	        		<div class="col-md-3">
		        		<b>Viernes:</b><br>
		        		Desde las: {{ $empresa->viernesingreso }} hrs. - hasta las {{ $empresa->viernessalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->sabadoingreso)
	        		<div class="col-md-3">
		        		<b>Sábado:</b><br>
		        		Desde las: {{ $empresa->sabadoingreso }} hrs. - hasta las {{ $empresa->sabadosalida }} hrs.
		        	</div>
	        	@endif
	        	@if ($empresa->domingoingreso)
	        		<div class="col-md-3">
		        		<b>Domingo:</b><br>
		        		Desde las: {{ $empresa->domingoingreso }} hrs. - hasta las {{ $empresa->domingosalida }} hrs.
		        	</div>
	        	@endif
	        </div>
			<div class="clearfix"> </div>

	<div class="w3ls-section wthree-pricing">
		<div class="container mt-3">
			<div class="wthree_head_section">

				<h3 class="w3l_header">Tu horario <span>Disponible</span></h3>
				<p>Dejanos saber tu horario disponible y nos comunicamos contigo para confirmar la reserva.</p>

			</div>

			 <div class="col-md-12" align="center">	
			 	<div class="col-md-6">
					<div class="btn-group">
	 					 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Dia de cita <span class="caret"></span>
	 					</button>

						<ul class="dropdown-menu" role="menu">
						<li><a href="">Lunes</a></li>
						<li><a href="">Martes</a></li>
						<li><a href="">Miércoles</a></li>
						<li><a href="">Jueves</a></li>
						<li><a href="">Viernes</a></li>
						<li><a href="">Sábado</a></li>
						<li><a href="">Domingo</a></li>
						</ul>

					</div>
		 		</div>
		        	

	        		<div class="col-md-6">
		        		<div class="input-group mb-6">
		                    <div class="input-group-prepend">
		                        <span class="input-group-text">Hora de cita</span>
		                    </div>
		                    <input type="time" class="form-control @error('cita_hora') is-invalid @enderror" value="{{ $citas->cita_hora }}" name="cita_hora">
	                        @error('cita_hora')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
		                </div>
					</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
</div>
