<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
<?php 
require('../vistas/indexInsertarEmpleado.php');
require('../dao/DaoEmpleadoImplementacion.php');
$dao = new DaoEmpleadoImplementacion();
if (isset($_POST['boton'])) {
     $nombre=$_POST['nombre'];
     $apellido=$_POST['apellido'];
     $identificacion=$_POST['identificacion'];
     $tipoDocumento=$_POST['tipoDocumento'];
     $genero= $_POST['genero']; 
     $correo= $_POST['correo']; 
     $fechaNacimiento=$_POST['fechaNacimiento']; 
     $telefono=$_POST['telefono']; 
     $direccion=$_POST['direccion']; 
     $ciudad=$_POST['ciudad'];
     $fechaExpedicion=$_POST['fechaExpedicion'];  
     $estadoCivil=$_POST['estadoCivil'];  
     $nivelEstudio=$_POST['nivelEstudio'];  
     $e = new Empleado( $nombre,$apellido,$identificacion,$tipoDocumento,$genero,$correo,
     $fechaNacimiento,$telefono,$direccion,$ciudad,$fechaExpedicion,$estadoCivil,$nivelEstudio);
    $dao->registrar($e);
    echo "REGISTRO INSERTADO CON EXITO";    
}
           
?>    
</body>
</html>
