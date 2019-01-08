<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
    	<ul class="nav nav-pills nav-stacked">
    		@if (auth()->check())
				<li><a href="#">dashboard</a></li>
				<li><a href="#">ver incidencias</a></li>
				<li><a href="#">reportar incidencias</a></li>
				
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
			@else
				<li><a href="#">bienvenido</a></li>
				<li><a href="#">instrucciones</a></li>
				<li><a href="#">créditos</a></li>
			@endif

    	</ul>
    </div>
</div>

