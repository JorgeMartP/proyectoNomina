<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="section">
    
    <div class="wrap">
    <form action="../controlador/controladorRegistroEmpleado.php", method="POST">
    <label for="">NOMBRE</label>    
    <input type="text" name="nombre" id="nombre" class="form-control">
    
    <label for="">APELLIDO</label>    
    <input type="text" name="apellido" id="apellido" class="form-control">
    
    <label for="">IDENTIFICACION</label>    
    <input type="text" name="identificacion" id="identificacion" class="form-control">
    
    <label for="">TIPO DE DOCUMENTO</label>    
    <input type="text" name="tipoDocumento" id="TipoDoc">

    <label for="">GENERO</label>    
    <input type="text" name="genero" id="genero">
    
    <label for="">CIUDAD</label>    
    <input type="text" name="ciudad" id="ciudad">

    <label for="">CORREO</label>    
    <input type="mail" name="correo" id="correo">

    <label for="">FECHA DE NACIMIENETO</label>    
    <input type="date" name="fechaNacimiento" id="fechaNacimiento">

    <label for="">FECHA DE EXPEDICIÓN</label>    
    <input type="date" name="fechaExpedicion" id="fechaExpedicion">

    <label for="">TELEFONO</label>    
    <input type="text" name="telefono" id="Telefono">

    <label for="">DIRECCION</label>    
    <input type="text" name="direccion" id="direccion">

    <label for="">ESTADO CIVIL</label>    
    <input type="text" name="estadoCivil" id="estadoCivil">

    <label for="">NIVEL ESTUDIO</label>    
    <input type="text" name="nivelEstudio" id="nivelEstudio">


    <input type="submit" name="boton" value="Insertar Registro" class="btn btn-primary">
    </form>
    </div>
    </section>         
</body>
</html>