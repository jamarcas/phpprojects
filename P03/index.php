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

<?php
header("Cache-control: private");

header("Pragma: no-cache");

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
		<div class="panel panel-default">
			<div class="panel_heading" ><b>Dados Aleatorio</b></div>
  			<div class="panel-body">
				<div class="mycontainer footer">
					<?php
						$dado1=dadoAleatorio();
						echo "<br>";
						$dado2=dadoAleatorio();
						echo "<br>";
					?>
					<div class="col-md-2 col-centered" >
						<img src="./imagenes/dadoCara<?=$dado1?>.png" width=70px>
					</div>
					<div class="col-md-2 col-centered" >
						<img src="./imagenes/dadoCara<?=$dado2?>.png" width=70px>
					</div>
					<form name="formulario" method="get" action="calcula.php">
						<!-- Elementos ocultos dentro de nuestro HTML -->
						<input type="hidden" name="dado1" value="<?=$dado1?>">
						<input type="hidden" name="dado2" value="<?=$dado2?>">
						<div class="col-md-2 col-centered" >
							<b>Primer Dado</b>
							<input name="numero1" type="text" value="<?php echo $numero1?>">
						</div>
						<div class="col-md-2 col-centered" >
							<b>Segundo Dado</b>
							<input name="numero2" type="text" value="<?php echo $numero2?>">
						</div>
						<div class="col-md-1 col-centered" >
							<b>+</b>
							<input type="radio" name="calculo"
								<?php 
									//Si el elemento existe y coincide con + checkear
									if (isset($calculo) && $calculo=="+") 
										echo "checked";
								?>
							value="+">
						</div>
						<div class="col-md-1 col-centered" >
							<b>-</b>
							<input type="radio" name="calculo" 
								<?php 
									if(isset($calculo) && $calculo=="-")
										echo "checked";
								?>
							value="-">
						</div>
						<div class="col-md-2 col-centered">
							<input type="submit">
						</div>
					</form>	
				</div>
			</div>
		</div>	
	</body>
</html>