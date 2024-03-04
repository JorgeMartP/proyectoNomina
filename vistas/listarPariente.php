<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Listar</title>    
</head>
<body>
<section class="section">
    <div class="div">
    <table class="table">
            <caption>LISTADO DE EMPLEADOS</caption>
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>IDENTIFICACION</th>
                    <th>TIPO DE DOCUMENTO</th>
                    <th>GENERO</th>
                    <th>CORREO</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th>TELEFONO</th>
                    <th>DIRECCION</th>
                    <th>CIUDAD</th>
                    <th>FECHA DE EXPEDICION</th>
                    <th>ESTADO CIVIL</th>
                    <th>NIVEL DE ESTUDIO</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($Parientes as $key) {
                    
                    echo "<tr><td>". $key->getNombre() . "</td>";
                    echo "<td>". $key->getApellido() . "</td>";
                    echo "<td>". $key->getIdentificacion() . "</td>";
                    echo "<td>". $key->getTipoDocumento() . "</td>";
                    echo "<td>". $key->getGenero() . "</td>";                   
                    echo "<td>". $key->getCorreo() . "</td>";                   
                    echo "<td>". $key->getFechaNacimiento() . "</td>";                   
                    echo "<td>". $key->getTelefono() . "</td>";                   
                    echo "<td>". $key->getDireccion() . "</td>";                   
                    echo "<td>". $key->getCiudad() . "</td>";
                    echo "<td>". $key->getFechaExpedicion() . "</td>"; 
                    echo "<td>". $key->getEstadoCivil() . "</td>"; 
                    echo "<td>". $key->getN() . "</td></tr>"; 
                                                   
                }?>
            </tbody>
    </table>
    </div>
    <section class="section">
</body>

</html>