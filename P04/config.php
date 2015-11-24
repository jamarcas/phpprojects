<!-- 
	Autor: Javier Martín Castro
	2ºDAW - Desarrollo Web en Entorno Servidor
-->

<!-- Array Multidimensional con los menús del juego -->
<?php
	//Array que guardará el idioma del juego
	$lang = "sp";
	//Array que contiene subarrays
	$menu = array(
		//Array para el título
		"titulo"=>array(
			"sp"=>"Math Dice",
			"en"=>"Math Dice"
		),
		//Array para la portada
		"portada"=>array(
			"sp"=>"Inicio",
			"en"=>"Home"
		),
		//Array para el Tipo de Juego
		"tipoJuego"=>array(
			"sp"=>"Tipo Juego",
			"en"=>"Game choice",
			//Submenús con Array
			"submenu"=>array(
				//Array para el Juego Tradicional
				"tipo1"=>array(
					"sp"=>"Juego Tradicional",
					"en"=>"Tradicional Game"
				),
				//Array para el Juego Modificado
				"tipo2"=>array(
					"sp"=>"Juego Modificado",
					"en"=>"Game Modified"
				),
				//Array para el Juego de Niños
				"tipo3"=>array(
					"sp"=>"Juego Niños",
					"en"=>"Kid Game"
				)
			),
		),
		//Array para las instrucciones del juego.
		"instrucciones"=>array(
			"sp"=>"Instrucciones",
			"en"=>"Instuctions"
		)
	)
?>


