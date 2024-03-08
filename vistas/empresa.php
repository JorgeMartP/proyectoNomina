<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="estilos.css"> -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../styles/estiloCard.css">
    <link rel="stylesheet" href="../styles/modal.css">
    <title>Listar</title>    
</head>
<body>
    <h1>Elige una Empresas</h1>
    <div class="container">
<?php 
    
    if(count($Empresas) != 0){
    foreach ($Empresas as $key) {?>
    
        
        <div class="card">
            <div class="img">
                <img src="<?= $key->getLogo()?>" alt="logo">
            </div>
            <span><?=$key->getNombreEmpresa()?></span>
            <div class="info">
                <p><span>Nit: </span><?=$key->getNit()?></p>
                <p><span>Dirección: </span><?=$key->getDireccionEmpresa()?></p>
                <p><span>Teléfono: </span><?=$key->getTelefonoEmpresa()?></p>
                <p><span>Correo: </span><?=$key->getCorreoEmpresa()?></p>
            </div>
            <div class="share">
                <a href="../controlador/controladorEliminarEmpresa"><i class='bx bxs-trash'></i></a>
                <a href="../vistas/editarEmpresa.php?id=<?=$key->getNit()?>" class="update"><i class='bx bxs-edit'></i></a>
            </div>
            <a href="../controlador/controladorEmpleado.php?empresa=<?=$key->getNit()?>">Ingresar</a>
        </div>
            <?php  }}?>
        <div class="card">
            <h1>Crear Empresa</h1>
            <div class="img">
                <button id="open-modal-btn" class="add"><i class='bx bxs-add-to-queue'></i></button>
            </div>
        </div>
    </div>
<div id="modal" class="modal">
   <div class="modal-content">
    <span id="close-modal-btn">&times;</span>
    <h1>Registrar Empresa</h1>
    <form action="controladorEmpresa.php" id="registration-form" class="form" method="POST" enctype="multipart/form-data">
        <div class="flex">
            <div class="form-group">
                <input type="text" id="nit" name="nit" class="form-input" required>
                <label for="nit" class="heading">NIT</label>
            </div>
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-input"  required>
                <label for="nombre" class="heading">Nombre</label>
            </div>
        </div>
        <div class="flex">
            <div class="form-group">
                <input type="text" id="direccion" name="direccion" class="form-input" required>
                <label for="direccion" class="heading">Dirección</label>
            </div>
            <div class="form-group">
                <input type="text" id="telefono" name="telefono" class="form-input" required>
                <label for="telefono" class="heading">Teléfono</label>
            </div>
        </div>
        <div class="flex">
            <div class="form-group">
                <input type="email" id="correo" name="correo" class="form-input" required>
                <label for="correo" class="heading">Correo</label>
            </div>
            <div class="form-group">
                <input type="text" id="tipoContribuyente" name="tipoContribuyente" class="form-input" required>
                <label for="tipoContribuyente" class="heading">Tipo Contribuyente</label>
            </div>
        </div>
        <div class="form-group">
            <input type="text" id="rut" name="rut" class="form-input" required>
            <label for="rut" class="heading">Rut</label>
        </div>
        <div class="form-group">
            <input type="text" id="digitoVerificacion" name="digitoVerificacion" class="form-input" required>
            <label for="digitoVerificacion" class="heading">Dígito Verificación</label>
        </div>
        <div class="form-group">
            <input type="file" id="logo" name="imagen" class="form-input" accept="image/*" required>
            <label for="logo" class="logo">Logo</label>
        </div>
        <div class="form-group">
            <input type="file" id="camaraComercio" name="pdf" class="form-input" accept=".pdf" required >
            <label for="camaraComercio" class="logo">Cámara Comercio</label>
        </div>
        <input type="submit" value="Registrar" class="Boton" name="bottonEm">
    </form>
</div>
</div>


<script src="../js/modal.js"></script>
<script>
    
</script>
</body>

</html>