<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Estructura de nuestro juego.-->

<!-- Incluimos tanto config.php como dado.php -->
<?php
    require_once ('config.php');
    require_once ('dado.php');
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
			    			<a href="#"><!--Nos referenciará a otra página-->
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
			        		<a href="#">
			        			<?=$menu["instrucciones"][$lang]?>
			        		</a>
		        		</li>
			      	</ul>
			    </div>
			</div>
		</nav>
		<!-- Colocamos nuestras imágenes-->
		<div class="panel panel-default">
			<div class="panel_heading"><b>Caras del Dado</b></div>
  			<div class="panel-body">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<img src="./imagenes/dadoCara1.png">
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara2.png" width=70px>
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara3.png" width=70px>
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara4.png" width=70px>
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara5.png" width=70px>
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara6.png" width=70px>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel_heading" ><b>Dado Aleatorio</b></div>
  			<div class="panel-body">
				<div class="mycontainer footer">
					<div class="row no-gutter">
						<div class="col-md-2 col-centered" >
							<!--Llamamos a la función aleatoria que tenemos en el archivo dado.php-->
							<img src="./imagenes/dadoCara<?=dadoAleatorio();?>.png" width=70px>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>