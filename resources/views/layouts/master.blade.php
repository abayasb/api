<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!--CSS-->

	<link rel="stylesheet" href="{{url('static/css/normalize.css?v='.time())}}">
	<link rel="stylesheet" href="{{url('static/css/sweetalert2.css?v='.time())}}">
	<link rel="stylesheet" href="{{url('static/css/material.min.css?v='.time())}}">
	<link rel="stylesheet" href="{{url('static/css/material-design-iconic-font.min.css?v='.time())}}">
	<link rel="stylesheet" href="{{url('static/css/jquery.mCustomScrollbar.css?v='.time())}}">
	<link rel="stylesheet" href="{{url('static/css//main.css?v='.time())}}">

	<!-- Javascript -->
	<script src="{{url('static/js/jquery-1.11.2.min.js')}}"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="{{url('static/js/material.min.js')}}"></script>
	<script src="{{url('static/js/sweetalert2.min.js')}}"></script>
	<script src="{{url('static/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{url('static/js/main.js?v='.time())}}"></script>
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
	<div id="app">
		<section class="full-width container-notifications">
			<div class="full-width container-notifications-bg btn-Notification"></div>
			<section class="NotificationArea">
				<div class="full-width text-center NotificationArea-title tittles">Notificaciones </div>
			</section>
		</section>
		<div class="full-width navBar">
			<div class="full-width navBar-options">
				<!--Comentar-->
				<!--<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	-->
				<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>
				<div class="mdl-tooltip" for="btn-menu">Menu</div>
				<nav class="navBar-options-list">
					<ul class="list-unstyle">

						<li class="btn-exit" id="btn-exit">
							<i class="zmdi zmdi-power"></i>
							<div class="mdl-tooltip" for="btn-exit">Cerrar sesión</div>
						</li>
						<li class="text-condensedLight noLink"><small>{{Auth::user()->username}}</small></li>

					</ul>
				</nav>
			</div>
		</div>
		<!--Nav Lateral-->
		<section class="full-width navLateral">
			<div class="full-width navLateral-bg btn-menu"></div>
			<div class="full-width navLateral-body">
				<div class="full-width navLateral-body-logo text-center tittles">
					<i class="zmdi zmdi-close btn-menu"></i> Analisis de ventas

				</div>
				<figure class="full-width" style="height: 77px;">
					<div class="navLateral-body-cl">
						<img src="{{url('static/assets/img/avatar-male.png')}}" alt="Avatar" class="img-responsive">
					</div>
					<figcaption class="navLateral-body-cr hide-on-tablet">
						<span>
						{{Auth::user()->username}} <br>
						</span>
					</figcaption>
				</figure>
				<div class="full-width tittles navLateral-body-tittle-menu">
					<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; MENÚ</span>
				</div>
				<nav class="full-width">
					<ul class="full-width list-unstyle menu-principal">
						<li class="full-width">
							<a href="{{ route('home') }}" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-view-dashboard"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									INICIO
								</div>
							</a>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="#!" class="full-width btn-subMenu">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-case"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									ADMINISTRACIÓN
								</div>
								<span class="zmdi zmdi-chevron-left"></span>
							</a>
							<ul class="full-width menu-principal sub-menu-options">

								<li class="full-width">
									<a href="{{ route('viewTipo') }}" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-label"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											TIPO
										</div>
									</a>
								</li>
								<li class="full-width">
									<a href="{{ route('viewMarca') }}" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-label"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											MARCA
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="#!" class="full-width btn-subMenu">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-face"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									USUARIOS
								</div>
								<span class="zmdi zmdi-chevron-left"></span>
							</a>
							<ul class="full-width menu-principal sub-menu-options">
								<li class="full-width">
									<a href="admin.html" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-account"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											ADMINISTRADORES
										</div>
									</a>
								</li>
								<li class="full-width">
									<a href="gerentes.html" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-accounts"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											GERENTES
										</div>
									</a>
								</li>

							</ul>
						</li>

						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="proveedor.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									PROVEEDORES
								</div>
							</a>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="articulos.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-washing-machine"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									PRODUCTOS
								</div>
							</a>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="kardex.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-widgets"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									VENTAS
								</div>
							</a>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="compras.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-widgets"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									COMPRAS
								</div>
							</a>
						</li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="inventario.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-store"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									INVENTARIO
								</div>
							</a>
						</li>
						<!--<li class="full-width divider-menu-h"></li>-->


						<li class="full-width divider-menu-h"></li>
						<li class="full-width divider-menu-h"></li>
						<li class="full-width">
							<a href="analisis.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-widgets"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									ANALISIS
								</div>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>

		@section('content')
			
		@show
	</div>
</body>

</html>