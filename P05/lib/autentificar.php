<?php
    require_once('jugador.php');
    require_once('basededatos.php');
    
    //Iniciamos la sesión
    session_start();
    //Creamos el objeto jugador
    $jugador = new Jugador();
    $db = new BaseDeDatos();
    
    //Commprobamos si la variable global $_POST no está vacía
    if( !empty($_POST) )
    {
    	$errors = array(); // declaramos un array para almacenar los errores
    	
    	if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']))
    	{
    		if(empty($_POST['nombre']))
    		{
    			header("Location: /P04/index.php");
    		}
    		
    		
    		if(empty($_POST['apellidos']))
    		{
    			header("Location: /P04/index.php");
    		}
    		
    		if(empty($_POST['edad']))
    		{
    			header("Location: /P04/index.php");
    		}
    		
    	}
    	
    	if(sizeof($errors) == 0)
    	{
    		//Si existe el POST jugador
    		if (isset($_POST['jugador'])) 
    		{
    			if(!isset($_SESSION['jugador']))
    			{
    			    //Si existe la base de datos
    			    if($jugadorDB = $db->selectUsuario($_POST['nombre'], $_POST['apellidos'])){
        				//Ponemos nombre al jugador
        				$jugador->setNombre($jugadorDB['nombre']);
        				$jugador->setApellidos($jugadorDB['apellidos']);
        				$jugador->setEdad($jugadorDB['edad']);
        				$jugador->setId($jugadorDB['id']);
        				$jugador->puntuacion;
    			    }
    			    //Si no existe la base de datos
    			    else{
    			        $id = $db->insertUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['edad']);
    			        //Ponemos nombre al jugador
        				$jugador->setNombre($_POST['nombre']);
        				$jugador->setApellidos($_POST['apellidos']);
        				$jugador->setEdad($_POST['edad']);
        				$jugador->setId($id);
        				$jugador->puntuacion;
    			    }
    			}
    			//Inicializamos jugador
    			$_SESSION['jugador'] = $jugador;
    		}
    
    		//Según la edad es el Juego Math Dice o Math Dice PLUS
    		$edad = $_POST['edad'];
    		if($edad < 10)
    		{
    			header ("Location: /P04/juego.php");
    		}
    		else if ($edad >= 10)
    		{
    			header ("Location: /P04/juegoPlus.php");
    		}
    	}
    }	
?>