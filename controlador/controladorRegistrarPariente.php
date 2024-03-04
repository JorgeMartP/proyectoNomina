<?php

require('../dao/DaoParienteImpl.php');
$dao=new DaoParienteImpl();
if (isset($_GET['boton'])) {
    $nombre=$_GET['nombre'];
    $apellido=$_GET['apellido'];
    $identificacion=$_GET['identi'];
    $tipoDocumento=$_GET['tipodoc'];
    $genero=$_GET['genero'];
    $correo=$_GET['correo'];
    $fechaNacimiento=$_GET['fechaNac'];
    $telefono=$_GET['tele'];
    $direccion=$_GET['direcc'];
    $ciudad=$_GET['ciudad'];
    $parentesco=$_GET['parent'];
   
    $p=new Pariente($nombre,$apellido,$identificacion,$tipoDocumento,$genero,$correo,$fechaNacimiento,$telefono,$direccion,$ciudad,$parentesco);
    $dao->registrar($p);
    echo "REGISTRO INSERTADO CON EXITO";    
}
     
?>