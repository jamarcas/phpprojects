<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Función que nos devuelve el número aleatorio -->
<?php
    class Juego{
        function __constructor(){
            
        }
        function dadoAleatorio($random){
            $valor = rand(1, $random); //Función que nos da un número aleatorio
            return $valor;
        }
    }
?>