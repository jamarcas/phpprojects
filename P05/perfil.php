<?php
    require_once ('lib/config.php');
    require_once ('lib/autentificar.php');
    require_once('lib/basededatos.php');
	
	//Asignamos los datos de la sesión al objeto jugador
	$jugador = $_SESSION['jugador'];
	$db = new BaseDeDatos();
	
	//Obtenemos los datos asignados al jugador
    $nombre = $jugador->getNombre();
    $apellidos = $jugador->getApellidos();
    $edad = $jugador->getEdad();
    $puntos = $jugador->getPuntos();
    $id = $jugador->getId();
    
	if (isset($_POST['jugador'])) 
	{
		$nombreNuevo = $_POST['nombre'];
		$apellidosNuevos = $_POST['apellidos'];
		$edadNueva = $_POST['edad'];
		
	    //Guardamos los nuevos datos en la sesión jugador
	    $jugador->setNombre($nombreNuevo);
		$jugador->setApellidos($apellidosNuevos);
		$jugador->setEdad($edadNueva);
		
		//Asignamos los nuevos datos en la sesión jugador
		$_SESSION['jugador'] = $jugador;
		
		//Actualizar perfil de jugador
		if(isset($_POST['cambiarDatosPerfil'])){
			//Obtener los datos que vamos a actualizar
			$id = $_POST['id'];
			$puntos = $_POST['puntos'];;
			$nombreNuevo = $_POST['nombre'];
			$apellidosNuevos = $_POST['apellidos'];
			$edadNueva = $_POST['edad'];
			//Actualiza la base de datos
			$db->updateUsuario($id, $nombreNuevo, $apellidosNuevos, $edadNueva, $puntos);
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once ('lib/plantillaMath.php'); ?>
		<h1>MATH DICE</h1>
		<div class="panel panel-group" style="width: 560px; margin-left: 30%" style="float:center;">
			<div class="panel panel-default">
				<div class="panel_heading">
					<b style='margin-left:30px; font-size:35px;'>Actualiza los Datos</b>
				</div>
	  			<div class="panel-body">
					<div class="container">
						<form method="post" action="perfil.php">
							<input type="hidden" name="jugador" value="jugador">
							<input type="hidden" name="cambiarDatosPerfil" value="cambiaPerfil">
							<fieldset>
								<div>
									<label for="nombre">Nombre:</label>
		  							<input type="text" name="nombre" value="<?=$nombre?>" class="form-control" style="width: 450px">
		  						</div>
		  						<div>
									<label for="apellidos">Apellidos:</label>
									<input type="text" name="apellidos" value="<?=$apellidos?>" class="form-control" style="width: 450px">
								</div>
								<div>
									<label for="edad">Edad:</label>
									<input type="text" name="edad" value="<?=$edad?>" class="form-control" style="width: 450px" maxlength="2">
								</div>
								<div>
									<input type="hidden" name="puntos" value="<?=$puntos?>" class="form-control" style="width: 450px" maxlength="2">
									<input type="hidden" name="id" value="<?=$id?>" class="form-control" style="width: 450px" maxlength="2">
								</div>
								<div>
									<input type="submit" value="Guardar Datos" name="guardar" class="btn btn-primary">
								</div>
							</fieldset>
						</form>	
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>