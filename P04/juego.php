<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Estructura de nuestro juego.-->

<?php
    require_once ('lib/config.php');
    require_once ('lib/dado.php');
    require_once('lib/jugador.php');
	session_start();
	
	$juego = new Juego();
	$jugador = new Jugador();
	
	$dado1=$juego->dadoAleatorio(3);
	$dado2=$juego->dadoAleatorio(3);
	$dado3=$juego->dadoAleatorio(3);
	$dado4=$juego->dadoAleatorio(6);
	$dado5=$juego->dadoAleatorio(6);
	$dado6=$juego->dadoAleatorio(12);
	
	if (isset($_SESSION['jugador'])) {
		$jugador = $_SESSION['jugador'];
	}else{
		echo "No hay sesión";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Math Dice KIDS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/desactivarDado.js"></script>
		<link href="./css/dado.css" rel="stylesheet" type="text/css" >
		<style type="text/css">
			body{
				background:#4d79ff;
				background-image:url(imagenes/mathDice.jpg);
				background-size: 18%;
				background-repeat:no-repeat;
				background-position:right 52px;
			}
			
			h1{
				font-family: Comic, fantasy;
				font-size:68px;
				text-align:center;
				font-stretch: ultra-expanded;
			}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">
					<!--Accedemos al array multidimensional título dentro de menú-->
					<?=$menu["titulo"][$lang]?>
					</a>
				</div>
			    <div>
			    	<!--Creamos la lista con los elementos que contiene nuestro menú-->
			    	<ul class="nav navbar-nav nav-pills nav-stacked">
			    		<li class="active">
			    			<a href="index.php"><!--Nos referenciará a otra página-->
			    				<!--Accedemos al array multidimensional portada dentro de menú-->
			    				<?=$menu["portada"][$lang]?>
			    			</a>
			    		</li>
			    		<li class="dropdown">
    						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
    							<?php
			    					echo $menu["tipoJuego"][$lang];
			    				?> 
    						<span class="caret"></span></a>
    						<ul class="dropdown-menu" >
		            			<!--Entramos en la sección que queremos recorrer de nuestro array multidimensional-->
		            			<?php foreach($menu["tipoJuego"]["submenu"] as $clave => $valor){?>
		        					<li><a href="#">
		        						<?=$valor[$lang]."<br>";?>
		        					</a></li>
		        				<?php }?>
			          		</ul>
			        	</li>
			        	<li>
			        		<a href="instrucciones.php">
			        			<?=$menu["instrucciones"][$lang]?>
			        		</a>
		        		</li>
			      	</ul>
			      	<p class="navbar-text pull-right" ><a href="perfil.php">Perfil</a></p>
			      	<p class="navbar-text pull-right">Bienvenido <?=$jugador->getNombre();?></p>
			    </div>
			</div>
		</nav>
		<h1>MATH DICE KIDS</h1>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado1?>_3.png" class="dado3" value="<?=$dado1?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado2?>_3.png" class="dado3" value="<?=$dado2?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado3?>_3.png" class="dado3" value="<?=$dado3?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado4?>.png" class="dado6" value="<?=$dado4?>">
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara<?=$dado5?>.png" class="dado6" value="<?=$dado5?>">
						</div>
					</div>
					<div>
						<div class="col-md-12" >
							<img src="./imagenes/dodecaedro<?=$dado6?>.png" class="dado12">
						</div>
					</div>
					<div>
						<div class="col-md-6">
							<img src="./imagenes/suma.png" class="operacion" value="+">
						</div>
						<div class="col-md-6">
							<img src="./imagenes/resta.png" class="operacion" value="-">
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div id="jugada">
						<form name="formulario" method="get" action="lib/calcula.php">
							<!-- Elementos ocultos dentro de nuestro HTML -->
							<input type="hidden" name="dado1Jugada" value="<?=$dado1?>">
							<input type="hidden" name="dado1" value="">
							<input type="hidden" name="operacion1" value="">
							
							<input type="hidden" name="dado2Jugada" value="<?=$dado2?>">
							<input type="hidden" name="dado2" value="">
							<input type="hidden" name="operacion2" value="">
							
							<input type="hidden" name="dado3Jugada" value="<?=$dado3?>">
							<input type="hidden" name="dado3" value="">
							<input type="hidden" name="operacion3" value="">
							
							<input type="hidden" name="dado4Jugada" value="<?=$dado4?>">
							<input type="hidden" name="dado4" value="">
							<input type="hidden" name="operacion4" value="">
							
							<input type="hidden" name="dado5Jugada" value="<?=$dado5?>">
							<input type="hidden" name="dado5" value="">
		
							<input type="hidden" name="dado6" value="<?=$dado6?>">
							<div id="btn-jugada">
								
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</body>
</html>