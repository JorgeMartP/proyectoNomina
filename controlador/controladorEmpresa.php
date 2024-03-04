<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/estiloCard.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <title>Empresa</title>
</head>
<body>
<?php 
require('../dao/DaoEmpresaImp.php');
$dao=new DaoEmpresaImp();
$Empresas=$dao->listar();
if(isset($_POST['bottonEm'])){
    $nombreEmpresa = $_POST['nombre'];
    $nitEmpresa = $_POST['nit'];
    $direccionEmpresa = $_POST['direccion'];
    $telefonoEmpresa = $_POST['telefono'];
    $correoEmpresa = $_POST['correo'];
    $tipoContribuyente = $_POST['tipoContribuyente'];
    $digitoVerificacion = $_POST['digitoVerificacion'];
    $logoEmpresa = $_POST[''];
    $rut = $_POST['rut'];
    $camaraComercio = $_POST[''];
    $e = new Empresa($tipoContribuyente, $digitoVerificacion, $nitEmpresa, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa,  $logoEmpresa, $rut, $camaraComercio);
    $dao->registrar($e);
    echo "REGISTRO INSERTADO CON EXITO"; 
}
include('../vistas/empresa.php');
?>    
</body>
</html>

