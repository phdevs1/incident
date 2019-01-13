<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
    	<ul class="nav nav-pills nav-stacked">
    		@if (auth()->check())
				<li @if (request()->is('home')) class="active" @endif>
					<a href="/home">dashboard</a>
				</li>

				@if (!auth()->user()->is_client)
				<li @if (request()->is('ver')) class="active" @endif>
					<a href="/ver">ver incidencias</a>
				</li>
				@endif

				<li @if (request()->is('reportar')) class="active" @endif>
					<a href="/reportar">reportar incidencias</a>
				</li>
				
				@if (auth()->user()->is_admin)
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
						administracion <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="/usuarios">usuarios</a></li>
						<li><a href="/proyectos">proyectos</a></li>
						<li><a href="/config">configuracion</a></li>
					</ul>
				</li>
				@endif
			@else
				<li><a href="#">bienvenido</a></li>
				<li><a href="#">instrucciones</a></li>
				<li><a href="#">créditos</a></li>
			@endif

    	</ul>
    </div>
</div>

