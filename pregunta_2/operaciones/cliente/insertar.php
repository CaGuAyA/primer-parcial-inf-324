<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link href="./css/editar.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Ingresar datos de usuario</h1>
    <form id="editar_usuario" method="GET" action="insertarg.php">
        <div>
            C.I.:
            <input type="text" name="id_usuario_ci" value=""/>
        </div>
        <div>
            Nombre:
            <input type="text" name="nombre" value="" />
        </div>
        <div>
            Apellido Paterno:
            <input type="text" name="apellido_pat" value="" />
        </div>
        <div>
            Apellido Materno:
            <input type="text" name="apellido_mat" value="" />
        </div>
        <div>
            Fehca de Nacimiento:
            <input type="text" name="fecha_nacimiento" value="" />
        </div>
        <div>
            Contraseña:
            <input type="text" name="contraseña" value="" />
        </div>
        <div>
            Id Cliente:
            <input type="text" name="id_cliente" value="" />
        </div>
        <input id="guardar" type="submit" name="guardar" value="Guardar" />
    </form>
</body>

</html>