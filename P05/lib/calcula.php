<?php 
    require_once('jugador.php');
    require_once('autentificar.php');
    require_once('basededatos.php');
    
    $db = new BaseDeDatos();
    
    //Dados del 1 al 3
    $dado1 = $_GET["dado1"];
    $dado2 = $_GET["dado2"];
    $dado3 = $_GET["dado3"];
    
    //Dados del 1 al 6
    $dado4 = $_GET["dado4"];
    $dado5 = $_GET["dado5"];
    
    //Dodecaedro
    $dado6 = $_GET['dado6'];
    
    //Operandos de nuestra aplicación
    $operacion1 = $_GET["operacion1"];
    $operacion2 = $_GET["operacion2"];
    $operacion3 = $_GET["operacion3"];
    $operacion4 = $_GET["operacion4"];
    
    $resultado = 0; //inicializamos resultado

    $jugador = $_SESSION['jugador'];
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
		<script type="text/javascript" src="js/desactivarDado.js"></script>
		<link href="./css/dado.css" rel="stylesheet" type="text/css" >
		<style type="text/css">
			body{
				background: #66a3ff;
				background-image: url('imagenes/mathDiceDados.jpg');
			}
			#corners {
                border-radius: 15px 100px 30px;
                margin-top:100px;
                padding:30px;
                background: #0072e6;
                width: 700px;
                height: 400px; 
                float:center;
            }

		</style>
	</head>
	<body>
		<div class="container-fluid" id="corners">
		    <?php
    		    if($operacion1 == '+')
                {
                    $resultado = $dado1 + $dado2;
                }
                else if($operacion1 == '-')
                {
                    $resultado = $dado1 - $dado2;
                }
                else if($operacion1 == '*')
                {
                    $resultado = $dado1 * $dado2;
                }
                else if($operacion1 == '/')
                {
                    $resultado = $dado1 / $dado2;
                }
                
                if($operacion2 == '+')
                {
                    $resultado = $resultado + $dado3;
                }
                else if($operacion2 == '-')
                {
                    $resultado = $resultado - $dado3;
                }
                if($operacion2 == '*')
                {
                    $resultado = $resultado * $dado3;
                }
                else if($operacion2 == '/')
                {
                    $resultado = $resultado / $dado3;
                }
            
                if($operacion3 == '+')
                {
                    $resultado = $resultado + $dado4;
                }
                else if($operacion3 == '-')
                {
                    $resultado = $resultado - $dado4;
                }
                if($operacion3 == '*')
                {
                    $resultado = $resultado * $dado4;
                }
                else if($operacion3 == '/')
                {
                    $resultado = $resultado / $dado4;
                }
            
                if($operacion4 == '+')
                {
                    $resultado = $resultado + $dado5;
                }
                else if($operacion4 == '-')
                {
                    $resultado = $resultado - $dado5;
                }
                if($operacion4 == '*')
                {
                    $resultado = $resultado * $dado5;
                }
                else if($operacion4 == '/')
                {
                    $resultado = $resultado / $dado5;
                }
            
                if($resultado == $dado6){
                    echo "<h1 style='color:blue'><b>¡Enhorabuena has acertado!</b></h1>";
                    echo "<div style='border: 1px dashed; width:70%; padding:10px 20px; margin:5px 10px; text-align:center;'><h3>Tu resultado es : ".$dado1." ".$operacion1." ".$dado2." ".$operacion2." ".$dado3." ".$operacion3." ".$dado4." ".$operacion4." ".$dado5." = ".$resultado."</h3>";
                    echo "<h3>El dodecaedro da : ".$dado6."</h3></div>";
                    //Aumentamos la puntuación del Jugador
                    $jugador->setPuntos(5);
                    //Actualizamos la base de datos
                    $_SESSION['jugador'] = $jugador;
                    //Obtenemos los datos almacenados en la sesión jugador
                    $nombre=$jugador->getNombre();
                    $apellidos=$jugador->getApellidos();
                    $edad=$jugador->getEdad();
                    $id=$jugador->getId();
                    $puntos=$jugador->getPuntos();
                    //Actualizamos la base de datos
                    $db->updateUsuario($id, $nombre, $apellidos, $edad, $puntos);
                    
                    echo "<br><a href='/P05/juego.php' role='button' class='btn btn-primary' Click='return confirm('¿Desea Volver?');'> Volver </a>";
                }else{
                    echo "<h1 style='color:red'><b>¡La soluci&oacuten no es correcta!</b></h1>";
                    echo "<div style='border: 1px dashed; width:70%; padding:5px 10px; margin:5px 10px; text-align:center;'><h3>Tu resultado es : ".$dado1." ".$operacion1." ".$dado2." ".$operacion2." ".$dado3." ".$operacion3." ".$dado4." ".$operacion4." ".$dado5." = ".$resultado."</h3>";
                    echo "<h3>El dodecaedro da : ".$dado6."</h3></div>";
                    echo "<br><a href='/P05/juego.php' role='button' class='btn btn-primary' Click='return confirm('¿Desea Volver?');'> Volver </a>";
                }
            ?>
		</div>
	</body>
</html>