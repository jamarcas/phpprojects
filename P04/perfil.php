<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Página principal Juego.-->

<!-- Incluimos tanto config.php como dado.php -->
<?php
    require_once ('lib/config.php');
    require_once ('lib/dado.php');
    require_once ('lib/jugador.php');
	session_start();
	
	$jugador = new Jugador();
	
	if(!isset($_SESSION['jugador']))
	{
		//Ponemos nombre al jugador
		$jugador->setNombre($_POST['nombre']);
		$jugador->setApellidos($_POST['apellidos']);
		$jugador->setApellidos($_POST['edad']);
		
		//Inicializamos la sesión jugador introduciendo datos
	  	$_SESSION['jugador'] = $jugador;
	  	
	}else if(isset($_SESSION['jugador']))
	{
		//Asignamos los datos de la sesión al objeto jugador
	    $jugador = $_SESSION['jugador'];
	    //Obtenemos los datos asignados al jugador
	    $nombre = $jugador->getNombre();
	    $apellidos = $jugador->getApellidos();
	    $edad = $jugador->getEdad();
	}
	
	if( !empty($_POST) )
	{
		$errors = array(); // declaramos un array para almacenar los errores
		
		if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']))
		{
			if(empty($_POST['nombre']))
			{
				$errors[1] = "<span style='color:red;'>No ha introducido su nombre</span>";
			}
			else 
			{
				$jugador->setNombre($_POST['nombre']); //Añadimos el nombre al Jugador
			}
			
			if(empty($_POST['apellidos']))
			{
				$errors[2] = "<span style='color:red;'>No ha introducido sus apellidos</span>";
			}
			else 
			{
				$jugador->setApellidos($_POST['apellidos']); //Añadimos los apellidos al Jugador
			}
			
			if(empty($_POST['edad']))
			{
				$errors[3] = "<span style='color:red;'>No ha introducido su edad</span>";
			}
			else
			{
				$jugador->setEdad($_POST['edad']); //Añadimos la edad al Jugador
			}
		}
		if(sizeof($errors) == 0)
		{
			//Si existe el POST jugador
			if (isset($_POST['jugador'])) 
			{
				if(isset($_SESSION['jugador']))
				{
				    //Asignamos los datos de la sesión al objeto jugador
				    $jugador = $_SESSION['jugador'];
				    //Obtenemos los datos asignados al jugador
				    $nombre = $jugador->getNombre();
				    $apellidos = $jugador->getApellidos();
				    $edad = $jugador->getEdad();
				    
				    //Guardamos los nuevos datos en jugador
    			    $jugador->setNombre($_POST['nombre']);
					$jugador->setApellidos($_POST['apellidos']);
					$jugador->setEdad($_POST['edad']);
					//Asignamos los nuevos datos en la sesión jugador
    				$_SESSION['jugador'] = $jugador;
				    
				    $edadNueva = $_POST['edad'];
				    if($edadNueva < 10)
        			{
        				header ("Location: /P04/juego.php");
        			}
        			else if ($edadNueva >= 10)
        			{
        				header ("Location: /P04/juegoPlus.php");
        			}
				}
			}
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
		<style>
			body{
				background:#66a3ff;
				background-image:url('imagenes/dados.png');
				background-size:38%;
				background-position:right 55px;
				background-repeat:no-repeat;
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
			    </div>
			</div>
		</nav>
		<h1>MATH DICE</h1>
		<div class="panel panel-group" style="width: 560px; margin-left: 30%" style="float:center;">
			<div class="panel panel-default">
				<div class="panel_heading">
					<b style='margin-left:30px; font-size:35px;'>Actualiza los Datos</b>
				</div>
	  			<div class="panel-body">
					<div class="container">
						<form method="post" action="perfil.php">
							<input type="hidden" name="jugador">
							<fieldset>
								<div>
									<label for="nombre">Nombre:</label>
		  							<input type="type" name="nombre" value="<?=$nombre?>" class="form-control" style="width: 450px">
		  							<?php echo  $errors[1];?>
		  						</div>
		  						<div>
									<label for="apellidos">Apellidos:</label>
									<input type="text" name="apellidos" value="<?=$apellidos?>" class="form-control" style="width: 450px">
									<?php echo $errors[2];?>
								</div>
								<div>
									<label for="edad">Edad:</label>
									<input type="text" name="edad" value="<?=$edad?>" class="form-control" style="width: 450px" maxlength="2">
									<?php echo $errors[3];?>
								</div>
								<br/>
								<div>
									<input type="submit" value="Guardar Datos" name="guardar" class="btn btn-primary">
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