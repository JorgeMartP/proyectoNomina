<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="estilos.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Listar</title>    
</head>
<body>
<section class="section">
    <div class="div">
    <table class="table">
            <caption>LISTADO DE EMPRESA</caption>
            <thead>
                <tr>
                    <th>NIT</th>
                    <th>NOMBRE</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>CORREO</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($Aprendices as $key) {
                    echo "<tr><td>". $key->getNit() . "</td>";
                    echo "<td>". $key->getNombre() . "</td>";
                    echo "<td>". $key->getDireccion() . "</td>";
                    echo "<td>". $key->getTelefono() . "</td></tr>";
                    echo "<td>". $key->getCorreo() . "</td></tr>";
                    echo "<td> <a href='controlador/controladorActualizar.php?id=" . $key->getNit() . "'><i class='bx bxs-edit'></i></a>";
                    echo "<td> <a href='controlador/controladorEliminar.php?id=" . $key->getNit() . "'><i class='bx bxs-trash'></i></a>";
                }?>
            </tbody>
    </table>
    </div>
    <section class="section">
</body>

</html>