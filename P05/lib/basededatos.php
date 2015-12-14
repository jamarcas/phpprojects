<?php
    class BaseDeDatos{
        //variables de la base de datos
        private $host = "localhost";
        private $db = "usuarios";
        private $table = "usuario";
        private $user = "jamarcas";
        private $pass = "jamarcas";
        private $conexion;
        
        //Constructor
        function __construct(){
            //host, usuario, contraseña, base de datos
            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);
        }
        
        //Comprobamos si la conexion falla
        function comprobarConexion(){
            if ($this->conexion->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
            }
        }
        
        //Consulta SELECT
        function selectUsuario($nombre, $apellidos){
            //Consulta Query
            $consultaSelect = "SELECT * FROM ".$table. "WHERE nombre = ".$nombre." AND apellidos =".$apellidos;
            
            //Comprobamos consulta
            if($resultado = $this->conexion->query($consultaSelect)){
                $fila = $resultado->fetch_assoc();
                
                return $fila;
            }
            else{
                return false;
            }
        }
        
        //Consulta INSERT
        function insertUsuario($nombre, $apellidos, $edad){
            //Consulta Query
            $consultaInsert = "INSERT INTO ".$table. " (nombre, apellidos, edad) VALUES ('".$nombre."','".$apellidos."',".$edad.")";
           
            $this->conexion->query($consultaInsert);
            
            return $mysqli->insert_id;
        }
        
        //Consulta UPDATE
        function updateUsuario($nombre, $apellidos, $edad, $puntos){
            $consultaUpdate = "UPDATE ".$table." SET nombre=".$nombre.", apellidos=".$apellidos.", edad=".$edad.", puntos =".$puntos;
            
            $this->conexion->query($consultaUpdate);
        }
    }

?>