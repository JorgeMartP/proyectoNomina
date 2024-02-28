<?php
class Empresa{
    private $tipoContribuyente;
    private $nit;
    private $digitoVerificacion;
    private $nombre;
    private $telefono;
    private $correo;
    private $direccion;
    private $logo;
    private $rut;
    private $camaraComercio;

    public function __construct($tipoContribuyente,$nit,$digitoVerificacion, $nombre, $telefono, $correo, $direccion, $logo, $rut, $camaraComercio){
        $this->tipoContribuyente = $tipoContribuyente;
        $this->nit = $nit;
        $this->digitoVerificacion = $digitoVerificacion;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->logo = $logo;
        $this->rut = $rut;
        $this->camaraComercio = $camaraComercio;
    }
}

?>