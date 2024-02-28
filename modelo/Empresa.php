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

    public function __construct($tipoContribuyente, $digitoVerificacion, $nit, $nombre, $telefono, $correo, $direccion,  $logo, $camaraComercio){
    
        $this->nit = $nit;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->logo = $logo;
        $this->camaraComercio = $camaraComercio;
        $this->tipoContribuyente = $tipoContribuyente;
        $this->digitoVerificacion = $digitoVerificacion;
    }
    public function getTipoContribuyente(){
        return $this->tipoContribuyente;
    }
    public function getNit(){
        return $this->nit;
    }
    public function getDigitoVerificacion(){
        return $this->digitoVerificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getLogo(){
        return $this->logo;
    }
    public function getRut(){
        return $this->rut;
    }
    public function getCamaraComercio(){
        return $this->camaraComercio;
    }
    public function setTipoContribuyente($tipoContribuyente){
        $this->tipoContribuyente = $tipoContribuyente;
    }
    public function setNit($nit){
        $this->nit = $nit;
    }
    public function setDigitoVerificacion($digitoVerificacion){
        $this->digitoVerificacion = $digitoVerificacion;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setTelefono($telefono){
         $this->telefono = $telefono;
    }
    public function setCorreo($correo){
        $this->correo = $correo;
    }
    public function setDireccion($direccion){
         $this->direccion = $direccion;
    }
    public function setLogo($logo){
         $this->logo = $logo;
    }
    public function setRut($rut){
         $this->rut = $rut;
    }
    public function setCamaraComercio($camaraComercio){
         $this->camaraComercio = $camaraComercio;
    }


}

?>