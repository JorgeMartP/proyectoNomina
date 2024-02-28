<?php
require('Persona.php');

class Pariente extends Persona {
    private $parentesco;
    public function __construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad, $parentesco) {
        parent::__construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad);
        $this->parentesco = $parentesco;
    }
}
?>