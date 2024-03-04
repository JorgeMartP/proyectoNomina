<?php
require('Persona.php');

class Pariente extends Persona {
    private $parentesco;
    public function __construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad, $parentesco) {
        parent::__construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad);
        $this->parentesco = $parentesco;
    }

    public function getParentesco(){
        return $this->parentesco;
    }

    public function setParentesco($parentesco){
        return $this->parentesco = $parentesco;



        } 
    }
?>