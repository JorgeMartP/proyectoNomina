<?php
class Empresa{
    private $tipoContribuyente;
    private $nit;
    private $digitoVerificacion;
    private $nombreEmpresa;
    private $telefonoEmpresa;
    private $correoEmpresa;
    private $direccionEmpresa;
    private $logo;
    private $rut;
    private $camaraComercio;

    public function __construct($tipoContribuyente, $digitoVerificacion, $nit, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa,  $logo, $rut, $camaraComercio){
    
        $this->nit = $nit;
        $this->nombreEmpresa = $nombreEmpresa;
        $this->telefonoEmpresa = $telefonoEmpresa;
        $this->correoEmpresa = $correoEmpresa;
        $this->direccionEmpresa = $direccionEmpresa;
        $this->logo = $logo;
        $this->camaraComercio = $camaraComercio;
        $this->tipoContribuyente = $tipoContribuyente;
        $this->rut = $rut; 
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
    public function getNombreEmpresa(){
        return $this->nombreEmpresa;
    }
    public function getTelefonoEmpresa(){
        return $this->telefonoEmpresa;
    }
    public function getCorreoEmpresa(){
        return $this->correoEmpresa;
    }
    public function getDireccionEmpresa(){
        return $this->direccionEmpresa;
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
    public function setNombreEmpresa($nombreEmpresa){
        $this->nombreEmpresa = $nombreEmpresa;
    }
    public function setTelefono($telefonoEmpresa){
        $this->telefonoEmpresa = $telefonoEmpresa;
    }
    public function setCorreo($correoEmpresa){
        $this->correoEmpresa = $correoEmpresa;
    }
    public function setDireccion($direccionEmpresa){
        $this->direccionEmpresa = $direccionEmpresa;
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