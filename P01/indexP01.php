<!--
	2º DAW - Desarrollo Web en Entorno Servidor
	Autor: Javier Martín Castro.
	Fecha: 6 de Octubre de 2015

	Objetivo: Realizar un menú para el Juego Math Dice, con el uso de bootstrap, usando arrays
	asociativos multidimensionales.
-->

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


<!DOCTYPE html>
<html>
	<head>
		<title>Menu Proyecto01</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">
					<!--Accedemos al array multidimensional título dentro de menú-->
					<?php
						echo $menu["titulo"][$lang];
					?>
					</a>
				</div>
			    <div>
			    	<!--Creamos la lista con los elementos que contiene nuestro menú-->
			    	<ul class="nav navbar-nav">
			    		<li class="active">
			    			<a href="#"><!--Nos referenciará a otra página-->
			    				<!--Accedemos al array multidimensional portada dentro de menú-->
			    				<?php
									echo $menu["portada"][$lang];
								?>
			    			</a>
			    		</li>
			    		<li class="dropdown"><!--Creamos nuestro dropdown de submenús-->
			    			<a class="dropdown-toggle" data-toggle="dropdown" href="#">
			    				<?php
			    					echo $menu["tipoJuego"][$lang];
			    				?> 
			    				<span class="caret">
			    				</span>
			    			</a>
			        		<ul class="dropdown-menu">
				            	<li>
				            		<a href="#">
				            			<?php 
				        					echo $menu["tipoJuego"]["submenu"]["tipo1"][$lang];
					        			?>
				            		</a>
				            	</li>
				            	<li>
				            		<a href="#">
				            			<?php 
				        					echo $menu["tipoJuego"]["submenu"]["tipo2"][$lang];
					        			?>
				            		</a>
				            	</li>
				            	<li>
				            		<a href="#">
				            			<?php 
				        					echo $menu["tipoJuego"]["submenu"]["tipo3"][$lang];
					        			?>
				            		</a>
				            	</li>
			          		</ul>
			        	</li>
			        	<li>
			        		<a href="#">
			        		<?php
			        			echo $menu["instrucciones"][$lang];
			        		?>
			        		</a>
		        		</li>
			      	</ul>
			    </div>
			</div>
		</nav>
	</body>
</html>