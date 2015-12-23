<?php
    class BaseDeDatos{
        //variables de la base de datos
        private $host = "localhost";
        private $db = "usuarios";
        private $table = "usuario";
        private $user = "jamarcas";
        private $pass = "jamarcas";
        private $conexion;
        
        //CREAMOS EL CONSTRUCTOR
        function __construct() {
            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);
        }
        
        //Comprobamos si la conexion falla
        function comprobarConexion(){
            if ($this->conexion->connect_errno) 
            {
                echo "Fallo al conectar a MySQL: (" . $this->conexion->connect_errno . ") " . $this->conexion->connect_error;
            }
        }
        
        //Consulta SELECT
        function selectUsuario($nombre, $apellidos){
            //Consulta Query
            $consultaSelect = "SELECT * FROM " . $table . " WHERE nombre = " . $nombre ." AND apellidos =" . $apellidos;
            
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
            //INSERT INTO nombreTabla (nombre, apellidos, edad) VALUES ('reg1', 'reg2', 'reg3')";
            $consultaInsert = "INSERT INTO usuario (nombre, apellidos, edad)
            VALUES ('" . $nombre . "', '" . $apellidos . "', " . $edad . ")";
           
            if (mysqli_query($this->conexion, $consultaInsert)) {
                echo "New record created successfully";
            }
            else {
                echo "Error: " . $consultaInsert . "<br>" . mysqli_error($this->conexion);
            }
            
            return $this->conexion->insert_id;
        }
        
        //Consulta UPDATE
        function updateUsuario($nombre, $apellidos, $edad, $puntos,$id){
            $consultaUpdate = "UPDATE usuario SET 
            nombre='" . $nombre . "', apellidos='" . $apellidos . "', edad=" . $edad . ", puntos=" . $puntos . 
            " WHERE id=".$id;
            //Realizamos UPDATE
            $this->conexion->query($consultaUpdate);
        }
    }

?>