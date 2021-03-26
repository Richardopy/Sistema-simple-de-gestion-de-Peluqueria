
<div class="nav-bg">
	<div class="container">
		<nav class="navbar navbar-default shift">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
					aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a class="active" href="{{ url('/') }}">Principal</a></li>
					<li><a href="{{ url('/quienessomos') }}">Quienes Somos</a></li>
					<li><a href="{{ url('/productos') }}">Productos</a></li>
					<li><a href="{{ url('/servicios') }}">Servicios</a></li>
					<li><a href="{{ url('/contacto') }}">Contacto</a></li>
					@guest
						<li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">{{ Auth::user()->name }}<b class="caret"></b></a>
							<ul class="dropdown-menu agile_short_dropdown">
								@if (Auth::user()->nivel == 1)
									<li><a href="{{ url('/admin/panel') }}">Panel de Control</a></li>
								@endif
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</ul>
						</li>
					@endguest
				</ul>
			</div>
		</nav>
	</div>
</div>

