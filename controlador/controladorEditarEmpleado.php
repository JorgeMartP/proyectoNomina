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
require_once('../dao/DaoEmpleadoImplementacion.php');
    require_once('../dao/DaoEmpresaImp.php');
    $dao = new DaoEmpleadoImplementacion();
    $daoEmpre = new DaoEmpresaImp();
    
    if(isset($_GET['empresa'])){
        $objEmpresa = $_GET['empresa'];
        $identificacionE = $_GET['id'];
    }
    else{
        echo "no se envio el nit empresa";
    }
    $empresa = $daoEmpre->traer($objEmpresa);
    $Empleados=$dao->traer($identificacionE, $objEmpresa);
    if (isset($_POST['boton'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $identificacion = $_POST['identificacion'];
        $tipoDocumento = $_POST['tipoDocumento'];
        $genero = $_POST['genero'];
        $correo = $_POST['correo'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $ciudad = $_POST['ciudad'];
        $fechaExpedicion = $_POST['fechaExpedicion'];
        $estadoCivil = $_POST['estadoCivil'];
        $nivelEstudio = $_POST['nivelEstudio'];
        $e = new Empleado(
            $nombre,
            $apellido,
            $identificacion,
            $tipoDocumento,
            $genero,
            $correo,
            $fechaNacimiento,
            $telefono,
            $direccion,
            $ciudad,
            $fechaExpedicion,
            $estadoCivil,
            $nivelEstudio
        );
        $e->ingresarEmpresa($empresa);
        $dao->modificar($e);
        if($dao == true){
            header("Location: controladorEmpleado.php?empresa=". $objEmpresa);
        }
    }
    include('../vistas/editarEmpleado.php');
    ?>
</body>
</html>