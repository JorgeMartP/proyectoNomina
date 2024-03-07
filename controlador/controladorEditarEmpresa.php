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
    function validarPDF($archivo, $tamañoMaximo = 1048576, $tiposPermitidos = ["application/pdf"])
    {
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
    }

    function validarImagen($archivo)
    {
        $nombreArchivo = $archivo['name'];
        $tipoArchivo = $archivo['type'];
        $tamañoArchivo = $archivo['size'];
        $archivoTemp = $archivo['tmp_name'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
        $tamañoMaximo = 3 * 1024 * 1024;
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            echo "Tipo de archivo no permitido.";
        }
        if ($tamañoArchivo > $tamañoMaximo) {
            echo "El archivo supera el tamaño máximo permitido.";
        }
        $carpetaDestino = '../form-data/';
        $rutaCompleta = $carpetaDestino . $nombreArchivo;
        if (move_uploaded_file($archivoTemp, $rutaCompleta)) {
            return $rutaCompleta;
        }
    }
    $dao = new DaoEmpresaImp();
    if (isset($_GET['id'])) {
        $nit = $_GET['id'];
        $Actualizar = $dao->traer($nit);
    }
    $logoEmpresa = $Actualizar->getLogo();
    $camaraComercio1 = $Actualizar->getCamaraComercio();
    if (isset($_POST['bottonUp'])) {
        $nombreEmpresa = $_POST['nombreUp'];
        $nitEmpresa = $_POST['nitUp'];
        $direccionEmpresa = $_POST['direccionUp'];
        $telefonoEmpresa = $_POST['telefonoUp'];
        $correoEmpresa = $_POST['correoUp'];
        $tipoContribuyente = $_POST['tipoContribuyenteUp'];
        $digitoVerificacion = $_POST['digitoVerificacionUp'];
        $rut = $_POST['rutUp'];
        $a = new Empresa($tipoContribuyente, $digitoVerificacion, $nitEmpresa, $nombreEmpresa, $telefonoEmpresa, $correoEmpresa, $direccionEmpresa, $logoEmpresa, $rut, $camaraComercio1);

        if (!empty($_FILES['imagen']['name']) && !empty($_FILES['pdf']['name'])) {
            $logo = validarImagen($_FILES['imagen']);
            $camaraComercio = validarPDF($_FILES['pdf']);
            $a->setLogo($logo);
            $a->setCamaraComercio($camaraComercio);
        } elseif (!empty($_FILES['imagen']['name']) && empty($_FILES['pdf']['name'])) {
            $logo = validarImagen($_FILES['imagen']);
            $a->setLogo($logo);
        } elseif (empty($_FILES['imagen']['name']) && !empty($_FILES['pdf']['name'])) {
            $camaraComercio = validarPDF($_FILES['pdf']);
            $a->setCamaraComercio($camaraComercio);
        }
    
        $resultado = $dao->modificar($a);
    
        if ($resultado) {
            header("Location: controladorEmpresa.php");
        } else {
            echo "Hubo un problema al modificar los datos.";
        }
    } else {
        echo "No se enviaron los datos correctamente.";
    }
    ?>
</body>
</html>