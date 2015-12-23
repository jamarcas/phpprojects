<?php
    //Crear Clase Jugador
    class Jugador{
        //Variables Clase
        private $nombre = "Jugador 1";
        private $puntos = 0;
        //Crear Constructor
        function __constructor(){
            
        }
        
        //Crear Métodos Getters y Setters
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
        
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }
        
        public function getPuntos(){
            return $this->puntos;
        }
        
        public function setPuntos($puntos){
            $this->puntos += $puntos;
        }
    }
?>