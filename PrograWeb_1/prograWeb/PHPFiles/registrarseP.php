<!--/
Documento PHP que recibe los datos generales de un usuario
para el registro en la base de datos.
/-->
<?php

    $usuario = $_REQUEST["usuario"];
    $contrasena = $_REQUEST["clave"];
    $nombre = $_REQUEST["nombre"];
    $anno = $_REQUEST["anno"];
    $sexo = $_REQUEST["sexo"];

    $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
    $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

    $query = "insert into persona (nombrecompleto, sexo, fechaingresotec, usuario, contrasena) values ('$nombre', '$sexo', '$anno', '$usuario', '$contrasena')";
    $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");
    
    header("Location: ../PHPHTMLfiles/index.php");