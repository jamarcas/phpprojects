<?php
    require_once ('lib/config.php');
    require_once ('lib/autentificar.php');
    
    session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
		<?php require_once('lib/plantillaMath.php')?>
		<h1>MATH DICE</h1>
		<div class="panel panel-group" style="width: 560px; margin-left: 30%" style="float:center;">
			<div class="panel panel-default">
				<div class="panel_heading">
					<b style='margin-left:30px; font-size:35px;'>Introduce los Datos</b>
				</div>
	  			<div class="panel-body">
					<div class="container">
						<form method="post" action="lib/autentificar.php">
							<input type="hidden" name="jugador">
							<fieldset>
								<div>
									<label for="nombre">Nombre:</label>
		  							<input type="type" name="nombre" value="" class="form-control" style="width: 450px">
		  						</div>
		  						<div>
									<label for="apellidos">Apellidos:</label>
									<input type="text" name="apellidos" value="" class="form-control" style="width: 450px">
								</div>
								<div>
									<label for="edad">Edad:</label>
									<input type="text" name="edad" value="" class="form-control" style="width: 450px" maxlength="2">
								</div>
								<br/>
								<div>
									<input type="submit" value="Enviar Datos" name="enviar" class="btn btn-primary">
								</div>
							</fieldset>
						</form>	
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>