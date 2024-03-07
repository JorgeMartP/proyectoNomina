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

function validarPDF($archivo, $tamañoMaximo = 1048576, $tiposPermitidos = ["application/pdf"]) {
    // Verifica si se ha enviado un archivo
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $archivo['name'];
        $tipoArchivo = $archivo['type'];
        $tamañoArchivo = $archivo['size'];
        $archivoTemp = $archivo['tmp_name'];
        $carpetaDestino = "../form-data/";
        $rutaCompleta = $carpetaDestino . $nombreArchivo;
        // Verifica el tipo de archivo
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            echo "Tipo de archivo no permitido. Solo se permiten archivos PDF.";
        }

        // Verifica el tamaño del archivo
        if ($tamañoArchivo > $tamañoMaximo) {
            return "El archivo PDF supera el tamaño máximo permitido.";
        }
        if (move_uploaded_file($archivoTemp, $rutaCompleta)) {
            return $rutaCompleta;
        } else {
            echo "Error al mover el archivo PDF.";
        }
    } else {
        echo "No se ha enviado ningún archivo o ocurrió un error en la carga.";
    }
}

function validarImagen($archivo) {
    $nombreArchivo = $archivo['name'];
    $tipoArchivo = $archivo['type'];
    $tamañoArchivo = $archivo['size'];
    $archivoTemp = $archivo['tmp_name'];
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    $tamañoMaximo = 3 * 1024 * 1024; 

        // Verifica el tipo de archivo
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            echo "Tipo de archivo no permitido.";
        }
        // Verifica el tamaño del archivo
        if ($tamañoArchivo > $tamañoMaximo) {
            echo "El archivo supera el tamaño máximo permitido.";
        }
        $carpetaDestino = '../form-Data/';
        $rutaCompleta = $carpetaDestino . $nombreArchivo;
        if(move_uploaded_file($archivoTemp, $rutaCompleta)){
            return $rutaCompleta;
        }
}
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
    $rut = $_POST['rut'];
    if (!empty($_FILES['imagen']['name']) && !empty($_FILES['pdf']['name'])){
        $logo = validarImagen($_FILES['imagen']);
        $camaraComercio= validarPDF($_FILES['pdf']);
        $e = new Empresa($tipoContribuyente, $digitoVerificacion, $nitEmpresa, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa,  $logo, $rut, $camaraComercio);
        $resultado = $dao->registrar($e);
        if ($resultado == true){
            header("Location: controladorEmpresa.php");
        }
    }else{
        echo "Complete todo los campos";
    }
    
    echo "REGISTRO INSERTADO CON EXITO"; 
}
include('../vistas/empresa.php');
?>    
</body>
</html>

