<?php
include("DaoEmpresa.php");
include("../Conexion.php");
include("../modelo/Empresa.php");
class DaoEmpresaImp extends Conexion implements DaoEmpresa{
    public function registrar(Empresa $a)
    {
        try{
            if ($this->getCnx()!=null) {
            $nit = $a->getNit();
            $nombre=$a->getNombre();
            $direccion=$a->getDireccion();
            $telefono=$a->getTelefono();
            $correo=$a->getCorreo();
            $tipoContribuyente = $a->getTipoContribuyente();
            $digitoVerificacion = $a->getDigitoVerificacion();
            $logo = $a->getLogo();
            $camaraComercio = $a->getCamaraComercio();
            $sql="insert into empresa values(?,?,?,?,?,?,?)";
            $stmt=$this->getCnx()->prepare($sql);
            $stmt->execute([$nit, $nombre, $direccion, $telefono, $correo, $tipoContribuyente, $digitoVerificacion,$logo, $camaraComercio]);        
            } else {
                echo $this->getCnx().' Es nulo <br>';
            }
        }catch(PDOException $p){
            echo $p->getMessage().'***********************';
        } 
    }
    public function modificar(Empresa $a){  
        $nit = $a->getNit();
        $nombre=$a->getNombre();
        $direccion=$a->getDireccion();
        $telefono=$a->getTelefono();
        $correo=$a->getCorreo();
        $tipoContribuyente = $a->getTipoContribuyente();
        $digitoVerificacion = $a->getDigitoVerificacion();
        $logo = $a->getLogo();
        $camaraComercio = $a->getCamaraComercio();
        $stmt=$this->getCnx()->prepare("UPDATE empresa " +
        "SET nombre =$nombre," +
        "formacion =$formacion," +
        "sexo = $sexo" +
        "where documento =$documento");
        $stmt->execute();
    }
    public function eliminar(Empresa $a)
    {
        $documento=$a->getNit();
        $stmt=$this->getCnx()->prepare("delete from aprendiz where documento=$documento");
        $stmt->execute(); 
    }
    public function listar()
    {
        $lista = null;
    try{    
        $stmt = $this->getCnx()->prepare("select * from empresa");
        $lista = array();
        $stmt->execute();
        foreach ($stmt as $key ) {           
            $a = new Empresa(null,null,null,null,null,null,null,null,null,null);
            $nit = $a->setNit($key['nombre']);
            $direccion=$a->setDireccion($key['nombre']);
            $telefono=$a->setTelefono($key['nombre']);
            $correo=$a->setCorreo($key['nombre']);
            $tipoContribuyente = $a->setTipoContribuyente($key['nombre']);
            $digitoVerificacion = $a->setDigitoVerificacion($key['nombre']);
            $logo = $a->setLogo($key['nombre']);
            $camaraComercio = $a->setCamaraComercio($key['nombre']);
            $nombre=$a->setNombre($key['nombre']);          
            array_push($lista,$a);            
        }        
        //$this->getCnx()->close();
    }catch(PDOException $e){
        $e->getMessage().'error en listar de DaoAprendizImpl';
    } 
        return $lista;   
    }

}

?>