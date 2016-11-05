<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gestao - Web</title>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/datepicker3.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/dataTables.min.css') }}" />
<script type="text/javascript" src="{{ URL::asset('js/lumino.glyphs.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-table.css') }}" />

<!--Icons-->


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Gestao</span>Web</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {!! Auth::user()->nombre1." ".Auth::user()->apellido1 !!} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{route('admin.perfil.edit', Auth::user()->id)}}" ><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>{!! trans('messages.perfil') !!}</a>
							</li>
							<li><a href="/admin/opciones" ><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> {{ trans('messages.opcionesGenerales')}}</a></li>
							<li><a href="/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> {{  trans('messages.cerrarSesion')}}</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li id="menu1" name="menu1"><a href="/admin/datasheet"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>{{ trans('messages.planilla') }}</a></li>
			<li id="menu2" name="menu2"><a href="/admin/aula"><svg class="glyph stroked location pin"><use xlink:href="#stroked-location-pin"/></svg>	<s</span> {{ trans('messages.aulas') }}</a></li>
			<li id="menu3" name="menu3"><a href="/admin/clase"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>{{ trans('messages.clases') }}</a></li>
			<li id="menu4" name="menu4"><a href="/admin/peticion"><svg class="glyph stroked empty message"><use xlink:href="#stroked-empty-message"/></svg>	{{ trans('messages.peticion') }}</a></li>
			<li id="menu5" name="menu5"><a href="/admin/algoritmo"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>{{ trans('messages.algoritmo') }}</a></li>
			<li id="menu6" name="menu6"><a href="/admin/profesores"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>{{ trans('messages.profesores') }}</a></li>			
			<li role="presentation" class="divider"></li>			
		</ul>

	</div><!--/.sidebar-->
		
	@yield('content')
	<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/chart.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/chart-data.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/easypiechart.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/easypiechart-data.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/home_made.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap-table.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/dataTables.min.js') }}"></script>

	<!-- Si no funciona algo del calendario, lq uite el datepicker-->
	
	<script type="text/javascript">
		function ejecutaralgoritmopro(){
		var answer = confirm("¿realmente desea imprimir estos datos?")
	if (answer){
		alert("Saliendo")
		location='/admin/algoritmo/make_algoritmo';
	}
	else{
		alert("Cancelado!")
	}

		}

	</script>
	<!--<script type="text/javascript">		
			for (var i = 1; i <= 10; i++) {
				console.log("entro"+i);
				$("menu"+i).Click(function(){
					console.log("entro");
					var clase=$("menu"+i).attr("name");
					sessionStorage.setItem("clase", clase);

				})
			};
			var active= sessionStorage.getItem("clase");
			$("#"+active).addClass("Active");
			
	</script>-->
	<script type="text/javascript">
		$( document ).ready(function() {
			
			var clase="";
			$("#menu1").click(function(){
				clase=$("#menu1").attr("name");
			    sessionStorage.setItem("clase", clase);		
				});
			$("#menu2").click(function(){
				clase=$("#menu2").attr("name");
			    sessionStorage.setItem("clase", clase);
				});
			$("#menu3").click(function(){
				clase=$("#menu3").attr("name");
			    sessionStorage.setItem("clase", clase);		
				});
			$("#menu4").click(function(){
				clase=$("#menu4").attr("name");
			    sessionStorage.setItem("clase", clase);		
				});
			$("#menu5").click(function(){
				clase=$("#menu5").attr("name");
			    sessionStorage.setItem("clase", clase);		
				});
			$("#menu6").click(function(){
				clase=$("#menu6").attr("name");
			    sessionStorage.setItem("clase", clase);		
				});
			var active= sessionStorage.getItem("clase");
			$("#"+active).addClass("active");
		});
	</script>
	<script type="text/javascript">
		$( document ).ready(function() {
			
		})
	</script>

</body>

</html>
