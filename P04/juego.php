<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Estructura de nuestro juego.-->

<?php
    require_once ('config.php');
    require_once ('dado.php');
    require_once ('dado1al6.php');
    require_once ('dado1al3.php');
    
	session_start();
	
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Menu</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link href="./css/dado.css" rel="stylesheet" type="text/css" >
		<style>
			#dados1 {
			    width: 60%;
			}
			#dados2 {
			    width: 60%;
			}
			#dados3 {
				padding:50px;
			    width: 100%;
			}
			#capa1{ position:absolute; z-index:1; }
			#capa2{ position:absolute; z-index:1;  width:200px; height:200px; }
			
			.izquierdo{
				height:200%;
				width:50%;
				float:left;
				text-align:center;
			}
			.derecho{
				height:200%;
				width:50%;
				float:right;
				text-align:center;
			}
			#texto {
			    position:absolute;
				margin-left:86px;
				margin-top:20px;
				font-size:25px;
			    z-index: 2;
			}
			#imagen {
			    position:absolute;
			    margin-left:60px;
			    z-index: 1;
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
			      	<p class="navbar-text pull-right">Bienvenido <?php echo $nombre." ". $apellidos;?></p>
			    </div>
			</div>
		</nav>
		<div class="panel izquierdo">
			<div class="panel_heading"><b>Dados</b></div>
  			<div class="panel-body">
				<div class="container-fluid">
					<?php
						$dado1=dadoAleatorio1al6();
						echo "<br>";
						$dado2=dadoAleatorio1al6();
						echo "<br>";
						$dado3=dadoAleatorio1al6();
						echo "<br>";
						$dado4=dadoAleatorio1al3();
						echo "<br>";
						$dado5=dadoAleatorio1al3();
						echo "<br>";
						$dado6=dadoAleatorio();
						echo "<br>";
					?>
					<div id="dados1" >
						<div class="col-md-4" >
							<img src="./imagenes/dadoCara<?=$dado1?>.png" width=70px>
						</div>
						<div class="col-md-4" >
							<img src="./imagenes/dadoCara<?=$dado2?>.png" width=70px>
						</div>
						<div class="col-md-4" >
							<img src="./imagenes/dadoCara<?=$dado3?>.png" width=70px>
						</div>
					</div>
					<div  id="dados2">
						<div class="col-md-6" >
							<img src="./imagenes/dadoCara<?=$dado4?>.png" width=70px>
						</div>
						<div class="col-md-6">
							<img src="./imagenes/dadoCara<?=$dado5?>.png" width=70px>
						</div>
					</div>
					<div  id="dados3">
						<div class="col-md-12" >
							<div id="imagen">
								<img src="./imagenes/dodecaedro.png" width=150px>
							</div>
							<div id="texto">
								<p><?=$dado6?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel derecho">
			<div class="panel_heading"><b>Resultados</b></div>
  			<div class="panel-body">
				<div class="container-fluid">
						<form name="formulario" method="get" action="calcula.php">
							<!-- Elementos ocultos dentro de nuestro HTML -->
							<input type="hidden" name="dado1" value="<?=$dado1?>">
							<input type="hidden" name="dado2" value="<?=$dado2?>">
							<div class="col-md-6 col-centered" >
								<b>Primer Dado</b>
								<input name="numero1" type="text">
							</div>
							<div class="col-md-6 col-centered" >
								<b>Segundo Dado</b>
								<input name="numero2" type="text">
							</div>
							</br>
							<div class="col-md-6"  style="float:left;">
								<b>+</b>
								<input type="radio" name="calculo" value="+">
								<b>-</b>
								<input type="radio" name="calculo" value="-">
							</div>
							</br>
							<div class="col-md-6"   style="float:rigth;">
								<input type="submit">
							</div>
						</form>	
					</div>
				</div>
			</div>
		</div>
	</body>
</html>