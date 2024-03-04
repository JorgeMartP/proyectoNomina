<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/modal.css">
</head>
<body>
    <?php
    require('../dao/DaoEmpresaImp.php');
    $dao=new DaoEmpresaImp();
    if (isset($_GET['id'])){
        $nit = $_GET['id'];
        $Actualizar = $dao->traer($nit);
    }
    if (isset($_POST['bottonUp'])){
        $nombreEmpresa = $_POST['nombreUp'];
    $nitEmpresa = $_POST['nitUp'];
    $direccionEmpresa = $_POST['direccionUp'];
    $telefonoEmpresa = $_POST['telefonoUp'];
    $correoEmpresa = $_POST['correoUp'];
    $tipoContribuyente = $_POST['tipoContribuyenteUp'];
    $digitoVerificacion = $_POST['digitoVerificacionUp'];
    $logoEmpresa = $_POST[''];
    $rut = $_POST['rutUp'];
    $camaraComercio = $_POST[''];
    $a = new Empresa($tipoContribuyente, $digitoVerificacion, $nitEmpresa, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa,  $logoEmpresa, $rut, $camaraComercio);
    $dao->modificar($a);
    if ($dao == true){
        
    }
    echo "REGISTRO Actualizado Correctamente CON EXITO"; 
    }
    include('../vistas/editarEmpresa.php')
    ?>
</body>
</html>