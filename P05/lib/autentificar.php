<?php
    require_once('jugador.php');
    require_once('basededatos.php');
    
    //Iniciamos la sesión
    session_start();
    //Creamos el objeto jugador
    $jugador = new Jugador();
    //Creamos objeto de la base de datos
    $db = new BaseDeDatos();
    
    var_dump($_POST['accionCambiarPerfil']);
    var_dump($jugador);
    
    //Commprobamos si la variable global $_POST no está vacía
    if( !empty($_POST) )
    {
    	if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']))
    	{
    		if(empty($_POST['nombre']))
    		{
    			header("Location: /P05/index.php");
    		}
    		
    		if(empty($_POST['apellidos']))
    		{
    			header("Location: /P05/index.php");
    		}
    		
    		if(empty($_POST['edad']))
    		{
    			header("Location: /P05/index.php");
    		}
    	}

		//Si existe el POST jugador
		if (isset($_POST['jugador'])) 
		{
			if(!isset($_SESSION['jugador']))
			{
				//Inicializamos y creamos la $_SESSION jugador 
				$_SESSION['jugador'] = $jugador;
				
			    //Si existe el registro en la base de datos
			    if($jugadorDB = $db->selectUsuario($_POST['nombre'], $_POST['apellidos'])){
    				//Ponemos nombre al jugador
    				$jugador->setNombre($jugadorDB['nombre']);
    				$jugador->setApellidos($jugadorDB['apellidos']);
    				$jugador->setEdad($jugadorDB['edad']);
    				$jugador->setId($jugadorDB['id']);
    				$jugador->setPuntos($jugadorDB['puntos']);
			    }
			    //Si no existe, inserta un nuevo registro
			    else{
			    	
			        $id = $db->insertUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['edad']);
			        //Ponemos nombre al jugador
    				$jugador->setNombre($_POST['nombre']);
    				$jugador->setApellidos($_POST['apellidos']);
    				$jugador->setEdad($_POST['edad']);
    				$jugador->setId($id);
    				$jugador->setPuntos(0);
    				
			    }
			}
			//Si hay una sesión empezada modificamos los datos del jugador
			else if(isset($_SESSION['jugador']))
			{
				$jugadorDB = $db->selectUsuario($_POST['nombre'], $_POST['apellidos']);
				//Ponemos nombre al jugador
				$jugador->setNombre($jugadorDB['nombre']);
				$jugador->setApellidos($jugadorDB['apellidos']);
				$jugador->setEdad($jugadorDB['edad']);
				$jugador->setId($jugadorDB['id']);
				$jugador->setPuntos($jugadorDB['puntos']);
				
				$_SESSION['jugador'] = $jugador;
				
			}
			
		}

		//Según la edad es el Juego Math Dice o Math Dice PLUS
		$edad = $_POST['edad'];
		if($edad < 10)
		{
			header ("Location: /P05/juego.php");
		}
		else if ($edad >= 10)
		{
			header ("Location: /P05/juegoPlus.php");
		}
	}
?>