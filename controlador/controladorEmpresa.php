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

// Función para validar un archivo PDF
function validarPDF($archivo, $tamañoMaximo = 1048576, $tiposPermitidos = ["application/pdf"]) {
    // Verifica si se ha enviado un archivo
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        // Obtener los detalles del archivo
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
        // Mover el archivo a la carpeta de destino
        if (move_uploaded_file($archivoTemp, $rutaCompleta)) {
            return $rutaCompleta;
        } else {
            echo "Error al mover el archivo PDF.";
        }
    } else {
        echo "No se ha enviado ningún archivo o ocurrió un error en la carga.";
    }
}
// Función para validar una imagen
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
        // Carpeta de destino para la imagen
        $carpetaDestino = '../form-Data/';
        $rutaCompleta = $carpetaDestino . $nombreArchivo;
        // Mover el archivo a la carpeta de destino
        if(move_uploaded_file($archivoTemp, $rutaCompleta)){
            return $rutaCompleta;
        }
}
// Crear una instancia de la clase DaoEmpresaImp
$dao = new DaoEmpresaImp();
// Listar todas las empresas
$Empresas = $dao->listar();
// Si se envió el formulario para agregar una empresa
if(isset($_POST['bottonEm'])){
    $nombreEmpresa = $_POST['nombre'];
    $nitEmpresa = $_POST['nit'];
    $direccionEmpresa = $_POST['direccion'];
    $telefonoEmpresa = $_POST['telefono'];
    $correoEmpresa = $_POST['correo'];
    $tipoContribuyente = $_POST['tipoContribuyente'];
    $digitoVerificacion = $_POST['digitoVerificacion'];
    $rut = $_POST['rut'];
    // Verificar si se han proporcionado archivos de imagen y PDF
    if (!empty($_FILES['imagen']['name']) && !empty($_FILES['pdf']['name'])){
        // Validar y guardar la imagen y el PDF
        $logo = validarImagen($_FILES['imagen']);
        $camaraComercio= validarPDF($_FILES['pdf']);
        // Crear un objeto Empresa con los datos del formulario y los archivos
        $e = new Empresa($tipoContribuyente, $digitoVerificacion, $nitEmpresa, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa,  $logo, $rut, $camaraComercio);
        // Registrar la empresa en la base de datos
        $resultado = $dao->registrar($e);
        // Redireccionar a la página principal si el registro es exitoso
        if ($resultado == true){
            header("Location: controladorEmpresa.php");
            
        }else{
            // Mostrar un mensaje de error si la empresa ya está registrada
            echo '<script type="text/javascript">
                function mostrarAlerta() {
                    Swal.fire({
                icon: "warning",
                title: "Error en el registro",
                text: "La empresa ya esta registrada"
                });
            }
            window.onload = mostrarAlerta;
            </script>';
        }
    }else{
        echo "Complete todo los campos";
    }
}
// Si se envió el ID de una empresa para eliminar
if(isset($_GET['empresa'])){
    $nit = $_GET['empresa'];
    $empresa = $dao->traer($nit);
    // Eliminar todos los empleados asociados a la empresa
    $resultado2 = $dao->eliminarEmpleado($empresa);
     // Eliminar la empresa de la base de datos
    $resultado = $dao->eliminar($empresa);
    // Redireccionar a la página principal si la eliminación es exitosa
    if ($resultado == true and $resultado2 == true){
        header("Location: controladorEmpresa.php");
    }else{
        echo $resultado;
    }
}

// Incluir la vista de empresa
include('../vistas/empresa.php');
?>    
</body>
</html>

