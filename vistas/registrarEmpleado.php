<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="estilos.css"> -->
</head>
<body>
    <section class="section">
    <h1>Registro Empresa</h1>
    <div class="wrap">
    <form action="../controlador/controladorregistro.php", method="GET">
    <label for="">NIT</label>    
    <input type="number" name="nit" id="nit" class="form-control">

    <label for="">DIGITO VERIFICACION</label>    
    <input type="text" name="digitoV" id="digitoV">
    
    <label for="">NOMBRE</label>    
    <input type="text" name="nombre" id="nombre" class="form-control">
    
    <label for="">DIRECCIÓN</label>    
    <input type="text" name="direccion" id="direccion" class="form-control">
    
    <label for="">TELEFONO</label>    
    <input type="number" name="telefono" id="telefono">

    <label for="">CORREO</label>    
    <input type="email" name="email" id="email">

    <label for="">TIPO CONTRIBUYENTE</label>    
    <input type="text" name="tipoC" id="tipoC">
    <input type="submit" name="boton" value="Insertar Registro" class="btn btn-primary">
    </form>
    </div>
    </section>         
</body>
</html>