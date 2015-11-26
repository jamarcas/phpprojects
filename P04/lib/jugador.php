<?php
    //Crear Clase Jugador
    class Jugador{
        //Variables Clase
        private $nombre = "Jugador 1";
        public $puntuacion = 0;
        //Crear Constructor
        function __constructor(){
            
        }
        //Crear Métodos
        public function getNombre(){
            return $this->nombre;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        
        public function getApellidos(){
            return $this->apellidos;
        }
        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }
        
        public function getEdad(){
            return $this->edad;
        }
        public function setEdad($edad){
            $this->edad = $edad;
        }
    }
?>
