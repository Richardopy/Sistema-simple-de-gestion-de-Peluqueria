<div>
		<div class="practice-areas">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Nuestros <span>Servicios</span></h3>
				<p>Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico - Texto Genérico</p>
			</div>
			
			@foreach ($servicios as $value)
			<?php
				if (empty($contador)){
				   $contador = 1;

				}else{
				   $contador++;
				endif
				}
				?>
				<div class="area-main">
					<div class="col-md-6 area-inner">
						<div class="area-img.$contador">
						</div>
						<div class="area-right p.$contador">
							<h5>{{$value->nombre }}</h5>
							<p class="para-w3-agile">{{$value->description }}</p>
						</div>
					</div>

			@endforeach
			</div>
		</div>
	</div>
</div>
