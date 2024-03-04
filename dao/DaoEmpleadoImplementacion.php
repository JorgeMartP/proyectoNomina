<?php

include ('daoEmpleado.php');
include('../conexion/conexion.php');
include('../modelo/empleado.php');
include('../modelo/Empresa.php');

class DaoEmpleadoImplementacion extends Conexion implements DaoEmpleado{

    public function registrar(Empleado $e){

        try{
            if($this->getCnx()!=null){
             
            $nombre=$e->getNombre();
            $apellido=$e->getApellido();
            $identificacion=$e->getIdentificacion();
            $tipoDocumento=$e->getTipoDocumento();
            $genero=$e->getGenero();
            $correo=$e->getCorreo();
            $fechaNacimiento=$e->getFechaNacimiento();
            $telefono=$e->getTelefono();
            $direccion=$e->getDireccion();
            $ciudad=$e->getCiudad();
            $fechaExpedicion=$e->getFechaExpedicion();
            $estadoCivil=$e->getEstadoCivil();
            $nivelEstudio=$e->getNivelEstudio();
            //$empresa = $e->ingresarEmpresa("Natural", "01", "12345678", "Calzado S.A.S", "3282679120", "calzado@gmail.com", "calle 33 # 24B - 123", "log.jpg", "camra.jpg");
        
            $nit = "12345678";
            $pariente = "22222222";
            $sql="insert into empleado (identificacion, nombre, apellido, tipoDocumento, genero, correo, fechaNacimiento, telefono, direccion, ciudad, fechaExpedicion, estadoCivil, nivelEstudio, nit, identificacionP) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt=$this->getCnx()->prepare($sql);
            $stmt->execute([$identificacion, $nombre, $apellido, $tipoDocumento, $genero,
            $correo, $fechaNacimiento, $telefono, $direccion, $ciudad, $fechaExpedicion, $estadoCivil,
            $nivelEstudio, $nit, $pariente]);
            }else {
                echo $this->getCnx().'Es nulo <br>';
            }
        }catch(PDOException $p){
            echo $p->getMessage().'***********************';
        }
    }
    public function modificar(Empleado $e){        
        $nombre=$e->getNombre();    
        $apellido=$e->getApellido();
        $identificacion=$e->getIdentificacion();
        $tipoDocumento=$e->getTipoDocumento();
        $genero=$e->getGenero();
        $correo=$e->getCorreo();
        $fechaNacimiento=$e->getFechaNacimiento();
        $telefono=$e->getTelefono();
        $direccion=$e->getDireccion();
        $ciudad=$e->getCiudad();
        $fechaExpedicion=$e->getFechaExpedicion();
        $estadoCivil=$e->getEstadoCivil();
        $nivelEstudio=$e->getNivelEstudio();
        $stmt=$this->getCnx()->prepare("UPDATE empleado " +
        "SET nombre =$nombre," +
        " apellido =$apellido," +
        "tipoDocumento = $tipoDocumento" +
        "genero = $genero" +
        "correo = $correo" +
        "fechaNacimiento = $fechaNacimiento" +
        " = $telefono" +
        "direccion = $direccion" +
        "ciudad = $ciudad" +
        "fechaExpedicion = $fechaExpedicion" +
        "estadoCivil= $estadoCivil" +
        "nivelEstudio= $nivelEstudio" +
        "where identificacion =$identificacion");
        $stmt->execute();        
    }
    public function eliminar(Empleado $e){        
        $identificacion=$e->getIdentificacion();
        $stmt=$this->getCnx()->prepare("delete from empleado where identificacion=$identificacion");
        $stmt->execute();        
    }
    public function listar(){
        $lista = null;
        try{    
            $stmt = $this->getCnx()->prepare("select * from empleado");
            $lista = array();
            $stmt->execute();
            foreach ($stmt as $key ) {           
                $e = new Empleado(null,null,null,null,null,null,null,null,null,null,null,null,null,null);
                $e->setNombre($key['nombre']);
                $e->SetApellido($key['apellido']);
                $e->setIdentificacion($key['identificacion']);
                $e->setTipoDocumento($key['tipoDocumento']);
                $e->setGenero($key['genero']);
                $e->setCorreo($key['correo']);
                $e->setGenero($key['genero']); 
                $e->setFechaNacimiento($key['fechaNacimiento']);
                $e->setTelefono($key['telefono']);
                $e->setDireccion($key['direccion']); 
                $e->setCiudad($key['ciudad']);
                $e->setFechaExpedicion($key['fechaExpedicion']);
                $e->setEstadoCivil($key['estadoCivil']);
                $e->setNivelEstudio($key['nivelEstudio']);
                $e->setNit($key['nit']);
                array_push($lista,$e);            
            }        
            //$this->getCnx()->close();
        }catch(PDOException $e){
            $e->getMessage().'error en listar de DaoAprendizImpl';
        } 
            return $lista;       
        } 

    
}
?>