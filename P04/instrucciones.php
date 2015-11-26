<?php 
    require_once ('lib/config.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Instrucciones</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<style>
		    body{
		        background:#66a3ff;
		        font-family: Comic;
		        color:blue;
		        background-image:url('imagenes/dados.png');
				background-size:38%;
				background-position:right 55px;
				background-repeat:no-repeat;
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
			    		<li>
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
			        	<li  class="active">
			        		<a href="instrucciones.php">
			        			<?=$menu["instrucciones"][$lang]?>
			        		</a>
		        		</li>
			      	</ul>
			    </div>
			</div>
		</nav>
		<div class="container-fluid">
		    <p>El Math Dice Jr es una versión más sencilla del juego educativo del mismo nombre. Este juego de dados entra 
		    en la categoría de juegos educativos ya que ayuda a los jugadores a repasar y conquistar las matemáticas utilizando operaciones de suma y resta.  En la versión original los jugadores pueden 
		    utilizar operaciones más complejas como multiplicación, división y exponentes.</p>  
            <h3><b>INFORMACIÓN GENERAL</b></h3>

            <p>El objetivo del juego es utilizar los dados de colores para formar combinaciones de suma o resta con un 
            resultado en específico.  Se juega sobre un tablero de tela en el cual se adelanta un espacio cada vez que 
            utilizas un dado para completar una operación matemática.  El primer jugador en llegar a la meta gana.</p>

            <p><b>Jugadores: dos o más</b></p>

            <p><b>Edades: 6 años en adelante</b></p>

            <p><b>Contenido:</b></p>

            <ul>
                <li>Un dado de doce lados</li>
                <li>Cinco dados de colores de seis lados</li>
                <li>Tablero de tela</li>
                <li>6 fichas circulares para moverse en el tablero</li>
                <li>Instrucciones</li>
                <li>Bolso de tela</li>
            </ul>  

            <h3>Descripción del tablero</h3>

            <p>El tablero es muy sencillo. Se trata de un camino de 15 espacios (sin contar la salida). En el tablero 
            encontrarás dos espacios marcados como llegada.  El primero es para un juego más corto, ideal para niños más 
            pequeños. El segundo espacio es para los que quieren un mayor reto y desean jugar un juego más largo.</p>

            <h3>REGLAS</h3>

            <p><b>Antes de comenzar</b></p>

            <ul>
                <li>Coloca el tablero de tela sobre una superficie plana.</li>
                <li>Cada jugador toma una ficha.  Pueden jugarlo por equipos si así lo desean.</li>
                <li>Coloca las fichas en el espacio marcado como Salida (Start).</li>
            </ul>

            <p><b>Desarrollo del juego</b></p>
            <ul>
                <li>El juego lo comienza el jugador más pequeño.</li>
                <li>Lo primero que debe hacer es lanzar el dado de doce caras.  El número que obtenga será el resultado 
                meta.</li>
                <li>Por ejemplo:  Si obtiene un 5 debe tratar de construir operaciones matemáticas de suma o resta cuya 
                contestación sea 5.</li>
                <li>Luego lanza todos los dados de seis caras al mismo tiempo. Estos serán los dados que utilizarán para
                construir las operaciones matemáticas.</li>
                <li>Todos los jugadores observan los dados y tratan de construir una operación matemática cuya contestación sea el número meta.</li>
                <li>El primer jugador en encontrarla debe decir Math Dice y demostrar la operación encontrada. Luego de explicar la operación deberá conservar los dados que utilizó.</li>
                <li>El resto de lo jugadores tratarán de encontrar operación matemática con los dados restantes.</li>
                <li>Ejemplos de jugadas con el 5 como resultado meta:  6 -1 = 5; 3 + 1 +1 = 5,</li>
                <li>El jugador que encuentre la operación  moverá su ficha en el tablero el número de dados que tenga en 
                su poder.</li>
                <li>El juego continúa con el jugador de la izquierda.</li>
            </ul>
            <p><b>Final del juego</b></p>
            <p>El juego termina cuando uno de los jugadores llega a la meta establecida. Este jugador gana el juego.</p>
 
            <p><b>Variantes</b></p>

            <p>Para jugadores más avanzados pueden incluir la multiplicación dentro de las operaciones. 
            Por ejemplo:  1 x 5 = 5.</p>
 
            <p><b>EVALUACIÓN</b></p>

            <p>Si lo que buscas es una manera de hacer el aprendizaje entretenido esta es una gran opción. El hecho de convertir el 
            construir operaciones matemáticas en un juego hace el proceso de aprendizaje mucho más llevadero. Aquellos que disfrutan 
            los retos matemáticos de seguro que también disfrutarán de este tipo de juegos.  El tamaño y colorido de los dados llama 
            la atención de los niños y facilita el hecho de verlo como un juguete más que una herramienta de aprendizaje. Me parece 
            ideal el que incluya un bolso de tela para guardar el contenido pues lo hace fácil de transportar y de guardar.</p>
    
		</div>
	</body>
</html>