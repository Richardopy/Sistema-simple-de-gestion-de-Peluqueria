<div>
	<div class="about">
		<div class="container">
			<div class="wthree_head_section">
				<h3 class="w3l_header">Tus <span>Productos</span></h3>
			</div>
			<div class="ab-agile">
				<div class="col-md-12 aboutleft">

					<h3>{{ Auth::user()->name }},estos son tus productos </h3>
					<p class="para1"></p>
				</div>	
				<div class="clearfix"></div>
					<div class="row">
	    @if ($misproductos->count())
		    <table class="table">
		        <thead>
		            <tr>
		                <th>Producto</th>
		            </tr>
		            
		        </thead>
		        <tbody>
		            @foreach ($misproductos as $value)
		                <tr>
		                	<td>{{ $value->nombre }}</td>
		                </tr>
		            @endforeach
		        </tbody>
		    </table>
	    @endif
</div>
			</div>
		</div>
	</div>
</div>

