<?php

include('daoPariente.php');
include('../conexion/conexion.php');
include('../modelo/Pariente.php');

class DaoParienteImpl extends Conexion  implements DaoPariente{

    public function registrar (Pariente $p){
        try{
            if ($this->getCnx() != null){
                $nombre=$p->getNombre();
                $apellido=$p->getApellido();
                $identificacion=$p->getIdentificacion();
                $tipoDocumento=$p->getTipoDocumento();
                $genero=$p->getGenero();
                $correo=$p->getCorreo();
                $fechaNacimiento=$p->getFechaNacimiento();
                $telefono=$p->getTelefono();
                $direccion=$p->getDireccion();
                $ciudad=$p->getCiudad();
                $parentesco=$p->getParentesco();
                $sql="insert into parientes values (?,?,?,?,?,?,?,?,?,?,?)";
                $stm=$this->getCnx()->prepare($sql);
                $stm->execute([$identificacion, $nombre, $apellido, $tipoDocumento, $genero, $correo, $fechaNacimiento, $telefono, $direccion, $ciudad, $parentesco]);

            }else{
                echo $this->getCnx().' Es Nulo <br>';
            }
        }catch(PDOException $p ){
            echo $p->getMessage().'***********************';
        }
    }

    public function modificar(Pariente $p){
        $nombre=$p->getNombre();
        $apellido=$p->getApellido();
        $identificacion=$p->getIdentificacion();
        $tipoDocumento=$p->getTipoDocumento();
        $genero=$p->getGenero();
        $correo=$p->getCorreo();
        $fechaNacimiento=$p->getFechaNacimiento();
        $telefono=$p->getTelefono();
        $direccion=$p->getDireccion();
        $ciudad=$p->getCiudad();
        $parentesco=$p->getParentesco();
        $stmt=$this->getCnx()->prepare("UPDATE pariente " +
        "SET tipoDocumento = $tipoDocumento" +
        "nombre = $nombre," +
        "apellido = $apellido"+
        "genero = $genero" +
        "correo = $correo" +
        "fechaNacimiento = $fechaNacimiento" +
        "telefono = $telefono" +
        "direccion = $direccion" +
        "ciudad = $ciudad" +
        "parantesco = $parentesco" +
        "where identificacion = $identificacion");
        $stmt->execute();
    }

    public function eliminar(Pariente $p){
        $identificacion=$p->getIdentificacion();
        $stmt=$this->getCnx()->prepare("delete from pariente where identifiacion=$identificacion");
        $stmt->execute();
    }
    
    //public function listar();
    public function listar(){
        try{
            $stmt = $this->getCnx()->prepare("select * from pariente");
            $lista = array();
            $stmt->execute();

        foreach ($stmt as $key ) {
            $p = new Pariente(null,null,null,null,null,null,null,null,null,null,null);
            $p->setNombre($key['nombre']);
            $p->setApellido($key['apellido']);
            $p->setNombre($key['identificacion']);
            $p->setTipoDocumento($key['tipoDocumento']);
            $p->setGenero($key['genero']);
            $p->setCorreo($key['correo']);
            $p->setFechaNacimiento($key['fechaNacimiento']);
            $p->SetTelefono($key['telefono']);
            $p->setDireccion($key['dirrecion']);
            $p->setCiudad($key['ciudad']);
            $p->setParentesco($key['parentesco']);
        }
        //$this->getCnx()->close();
    }catch(PDOException $e){
        $e->getMessage().'error en listar de DaoParienteImpl';
    }
        return $lista;
    }
    //public function buscar($campo,$dato);
    
}
?>


