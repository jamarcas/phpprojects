    <head>
		<title>Math Dice PLUS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="autor" content="Javier Martín" />
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/desactivarDado.js"></script>
		<link href="./css/dado.css" rel="stylesheet" type="text/css" >
		<style type="text/css">
			body{
				background:#4d79ff;
				background-image:url(imagenes/mathDice.jpg);
				background-size: 22%;
				background-repeat:no-repeat;
				background-position:right 52px;
			}

			h1{
				font-family: Comic, fantasy;
				font-size:68px;
				text-align:center;
				font-stretch: ultra-expanded;
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
			    		<li class="active">
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
			        	<li>
			        		<a href="instrucciones.php">
			        			<?=$menu["instrucciones"][$lang]?>
			        		</a>
		        		</li>
			      	</ul>
			      	<p class="navbar-text pull-right"><a href="perfil.php">Perfil</a></p>
			      	<p class="navbar-text pull-right">Bienvenido <?=$jugador->getNombre();?>, <?=$jugador->getPuntos();?> puntos </p>
			    </div>
			</div>
		</nav>
		<h1>MATH DICE PLUS</h1>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado1?>_3.png" class="dado3" value="<?=$dado1?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado2?>_3.png" class="dado3" value="<?=$dado2?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado3?>_3.png" class="dado3" value="<?=$dado3?>">
						</div>
						<div class="col-md-2" >
							<img src="./imagenes/dadoCara<?=$dado4?>.png" class="dado6" value="<?=$dado4?>">
						</div>
						<div class="col-md-2">
							<img src="./imagenes/dadoCara<?=$dado5?>.png" class="dado6" value="<?=$dado5?>">
						</div>
					</div>
					<div>
						<div class="col-md-12">
							<img src="./imagenes/dodecaedro<?=$dado6?>.png" class="dado12">
						</div>
					</div>
					<div>
						<div>
							<div class="col-md-6">
								<img src="./imagenes/suma.png" class="operacion" value="+">
							</div>
							<div class="col-md-6">
								<img src="./imagenes/resta.png" class="operacion" value="-">
							</div>
						</div>
					</div>