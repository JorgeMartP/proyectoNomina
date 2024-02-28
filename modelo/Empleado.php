<?php
require ('Persona.php');

class Empleado extends Persona {
    private $fechaExpedicion;
    private $estadoCivil;
    private $nivelEstudio;
    public function __construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad, $fechaExpedicion, $estadoCivil, $nivelEstudio) {
        parent::__construct($nombre, $apellido, $identificacion, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad);
        $this->fechaExpedicion = $fechaExpedicion;
        $this->estadoCivil = $estadoCivil;
        $this->nivelEstudio = $nivelEstudio;
}
}

?>