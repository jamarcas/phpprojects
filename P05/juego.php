<?php
	require_once('lib/autentificar.php');
    require_once ('lib/config.php');
    require_once ('lib/dado.php');

	$juego = new Juego();
	
	$dado1=$juego->dadoAleatorio(3);
	$dado2=$juego->dadoAleatorio(3);
	$dado3=$juego->dadoAleatorio(3);
	$dado4=$juego->dadoAleatorio(6);
	$dado5=$juego->dadoAleatorio(6);
	$dado6=$juego->dadoAleatorio(12);
	
	$jugador = $_SESSION['jugador'];
	var_dump($jugador);
	
?>

<!DOCTYPE html>
<html>
	<?php require_once('lib/juegoPlantilla.php');?>
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