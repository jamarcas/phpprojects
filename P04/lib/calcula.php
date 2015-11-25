<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Realizamos los cálculos y comprobaciones pertinentes después de pulsar el botón.-->

<?php 
    header ('Content-type: text/html; charset=utf-8');
    
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
    
    session_start();

    if($operacion1 == '+')
    {
        $resultado = $dado1 + $dado2;
    }
    else if($operacion1 == '-')
    {
        $resultado = $dado1 - $dado2;
    }
    
    if($operacion2 == '+')
    {
        $resultado = $resultado + $dado3;
    }
    else if($operacion2 == '-')
    {
        $resultado = $resultado - $dado3;
    }

    if($operacion3 == '+')
    {
        $resultado = $resultado + $dado4;
    }
    else if($operacion3 == '-')
    {
        $resultado = $resultado - $dado4;
    }

    if($operacion4 == '+')
    {
        $resultado = $resultado + $dado5;
    }
    else if($operacion4 == '-')
    {
        $resultado = $resultado - $dado5;
    }

    if($resultado == $dado6){
        echo "<h2 style='color:green'><b>¡Enhorabuena has acertado!</b></font>";
        echo "<h3>tu resultado es ".$resultado."</h3>";
        echo "<h3>el dodecaedro da ".$dado6."</h3>";
        echo "<a href='/P04/juego.php' role='button' class='btn btn-primary' Click='return confirm('¿Desea Volver?');'> Volver </a>";
    }else{
        echo "<h2 style='color:red'><b>¡La soluci&oacuten no es correcta!</b></font>";
        echo "<h3>tu resultado es ".$resultado."</h3>";
        echo "<h3>el dodecaedro da ".$dado6."</h3>";
    }
?>