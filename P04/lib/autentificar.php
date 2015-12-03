<?php
    require_once('jugador.php');
    
    //Iniciamos la sesión
    session_start();
    //Creamos el objeto jugador
    $jugador = new Jugador();
    
    //Commprobamos si la variable global $_POST no está vacía
    if( !empty($_POST) )
    {
    	$errors = array(); // declaramos un array para almacenar los errores
    	
    	if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['edad']))
    	{
    		if(empty($_POST['nombre']))
    		{
    			$errors[1] = "<span style='color:red;'>No ha introducido su nombre</span>";
    		}
    		else 
    		{
    			$jugador->setNombre($_POST['nombre']); //Añadimos el nombre al Jugador
    		}
    		
    		if(empty($_POST['apellidos']))
    		{
    			$errors[2] = "<span style='color:red;'>No ha introducido sus apellidos</span>";
    		}
    		else 
    		{
    			$jugador->setApellidos($_POST['apellidos']); //Añadimos los apellidos del Jugador
    		}
    		
    		if(empty($_POST['edad']))
    		{
    			$errors[3] = "<span style='color:red;'>No ha introducido su edad</span>";
    		}
    		else
    		{
    			$jugador->setEdad($_POST['edad']); //Añadimos la edad del Jugador
    		}
    	}
    	if(sizeof($errors) == 0)
    	{
    		//Si existe el POST jugador
    		if (isset($_POST['jugador'])) 
    		{
    			if(!isset($_SESSION['jugador']))
    			{
    				//Ponemos nombre al jugador
    				$jugador->setNombre($_POST['nombre']);
    				$jugador->setApellidos($_POST['apellidos']);
    				$jugador->setEdad($_POST['edad']);
    				$jugador->puntuacion;
    				//Inicializamos jugador
    			  	$_SESSION['jugador'] = $jugador;
    			}
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