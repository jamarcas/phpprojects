<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Realizamos los cálculos y comprobaciones pertinentes después de pulsar el botón.-->

<?php 
    $numero1 = $_GET["numero1"];    //Obtenemos el primer número 
    $numero2 = $_GET["numero2"];    //Obtenemos el segundo número con la funcion $_GET["name"];
    $dado1 = $_GET["dado1"];
    $dado2 = $_GET["dado2"];
    $operando = $_GET["calculo"];
    
    if($numero1==$dado1 && $numero2==$dado2){
        if($operando == "+"){
            $resultado = $numero1 + $numero2;
            echo $numero1." + ".$numero2." = ".$resultado;
        }
        else if($operando == "-"){
            if ($numero1 < $numero2){
                $resultado = $numero2 - $numero1;
                echo $numero2." - ".$numero1." = ".$resultado;
            }
            else if ($numero1 > $numero2){
                $resultado = $numero1 - $numero2;
                echo $numero1." - ".$numero2." = ".$resultado;
            }
            else if($numero1 == $numero2){
                $resultado = 0;
                echo $numero1." - ".$numero2." = ".$resultado;
            }
        }
    }
    else if($numero1!=$dado1 && $numero2==$dado2)
    {
        echo "<font color='red'><b>Error el n&uacutemero introducido por el Usuario para el Dado1: ".$numero1." y el dado mostrado en la imagen Dado1: ".$dado1." son distintos.</b></font>";
    }
    else if($numero1==$dado1 && $numero2!=$dado2)
    {
        echo "<font color='red'><b>Error el n&uacutemero introducido por el Usuario para el Dado2: ".$numero2." y el dado mostrado en la imagen Dado2: ".$dado2." son distintos.</b></font>";
    }
    else{
        echo "<font color='red'><b>Ning&uacuten n&uacutemero de los dados coincide con los mostrados.</b></font><br>";
    }
    
    echo "<div><input type='button' value='Volver' onclick='history.go(-1)'/></div>";
?>