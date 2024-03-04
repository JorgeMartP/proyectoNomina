<?php
include("DaoEmpresa.php");
include("../conexion/conexion.php");
include("../modelo/Empresa.php");
class DaoEmpresaImp extends Conexion implements DaoEmpresa{
    public function registrar(Empresa $a)
    {
        try{
            if ($this->getCnx()!=null) {
            $nit = $a->getNit();
            $nombre=$a->getNombreEmpresa();
            $direccion=$a->getDireccionEmpresa();
            $telefono=$a->getTelefonoEmpresa();
            $correo=$a->getCorreoEmpresa();
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
        try{
            $nit = $a->getNit();
            $nombre=$a->getNombreEmpresa();
            $direccion=$a->getDireccionEmpresa();
            $telefono=$a->getTelefonoEmpresa();
            $correo=$a->getCorreoEmpresa();
            $tipoContribuyente = $a->getTipoContribuyente();
            $digitoVerificacion = $a->getDigitoVerificacion();
            $logo = $a->getLogo();
            $camaraComercio = $a->getCamaraComercio();
            #$stmt=$this->getCnx()->prepare("UPDATE empresa " +
            #"SET nombre =$nombre," +
            #"formacion =$formacion," +
            #"sexo = $sexo" +
            #"where documento =$documento");
            #$stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage().'***********************';
        }
        
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
            $nit = $a->setNit($key['nit']);
            $direccion=$a->setDireccion($key['direccion']);
            $telefono=$a->setTelefono($key['telefono']);
            $correo=$a->setCorreo($key['correo']);
            $tipoContribuyente = $a->setTipoContribuyente($key['tipoContribuyente']);
            $digitoVerificacion = $a->setDigitoVerificacion($key['digitoVerificacion']);
            $logo = $a->setLogo($key['logo']);
            $rut = $a->setRut($key['rut']);
            $camaraComercio = $a->setCamaraComercio($key['camaraComercio']);
            $nombre=$a->setNombreEmpresa($key['nombre']);          
            array_push($lista,$a);            
        }        
        //$this->getCnx()->close();
    }catch(PDOException $e){
        $e->getMessage().'error en listar de DaoAprendizImpl';
    } 
        return $lista;   
    }

    public function traer($nit){
        try{    
            $stmt = $this->getCnx()->prepare("select * from empresa where nit = $nit");
            $lista = array();
            $stmt->execute();
            foreach ($stmt as $key ) {           
                $e = new Empresa(null,null,null,null,null,null,null,null,null,null);
                $nit = $e->setNit($key['nit']);
                $direccion=$e->setDireccion($key['direccion']);
                $telefono=$e->setTelefono($key['telefono']);
                $correo=$e->setCorreo($key['correo']);
                $tipoContribuyente = $e->setTipoContribuyente($key['tipoContribuyente']);
                $digitoVerificacion = $e->setDigitoVerificacion($key['digitoVerificacion']);
                $logo = $e->setLogo($key['logo']);
                $rut = $e->setRut($key['rut']);
                $camaraComercio = $e->setCamaraComercio($key['camaraComercio']);
                $nombre=$e->setNombreEmpresa($key['nombre']);          
                return $e;         
            }        
            //$this->getCnx()->close();
        }catch(PDOException $e){
            $e->getMessage().'error en listar de DaoAprendizImpl';
        } 
            
    }
}

?>