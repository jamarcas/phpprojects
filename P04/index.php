<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Página principal Juego.-->

<!-- Incluimos tanto config.php como dado.php -->
<?php
    require_once ('config.php');
    require_once ('dado.php');

	session_start();
	
	if( !empty($_POST) )
	{
		$errors = array(); // declaramos un array para almacenar los errores
		if(empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['edad']))
		{
			if(empty($_POST['nombre']))
			{
				$errors[1] = '<span>No ha introducido su nombre</span>';
			}
			else if(empty($_POST['apellidos']))
			{
				$errors[2] = '<span>No ha introducido sus apellidos</span>';
			}
			else if(empty($_POST['edad']))
			{
				$errors[3] = '<span>No ha introducido su edad</span>';
			}
		}
		else if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['edad']))
		{
			
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$edad = $_POST['edad'];
				var_dump($_POST);
			$_SESSION['jugador']= "SI";
			header ("Location: juego.php");
			
		
		}
		else
		{
			//si no existe se va a index.php
			header("Location: index.php");
		}
		
	}	
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
			body{
				background:#66a3ff;
			}
			.modalDialog {
				position: fixed;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				z-index: 99999;
				opacity:0;
				transition: opacity 400ms ease-in;
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
			        		<a href="#">
			        			<?=$menu["instrucciones"][$lang]?>
			        		</a>
		        		</li>
			      	</ul>
			    </div>
			</div>
		</nav>
		<div class="panel panel-group" style="width: 560px; margin-left: 30%">
			<div class="panel panel-default">
				<div class="panel_heading" ><b>Dados Aleatorio</b></div>
	  			<div class="panel-body">
					<div class="container">
						<form method="post" action="juego.php">
							<fieldset>
								<div>
									<label for="nombre">Nombre:</label>
		  							<input type="type" name="nombre" value="" class="form-control" style="width: 450px">
		  							<?php echo  $errors[1];?>
		  						</div>
		  						<div>
									<label for="apellidos">Apellidos:</label>
									<input type="text" name="apellidos" value="" class="form-control" style="width: 450px">
									<?php echo $errors[2];?>
								</div>
								<div>
									<label for="edad">Edad:</label>
									<input type="text" name="edad" value="" class="form-control" style="width: 450px">
									<?php echo $errors[3];?>
								</div>
								<div>
									<input type="submit" value="Enviar Datos" name="enviar" class="btn btn-primary">
									<?php echo $result?>
								</div>
							</fieldset>
						</form>	
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>