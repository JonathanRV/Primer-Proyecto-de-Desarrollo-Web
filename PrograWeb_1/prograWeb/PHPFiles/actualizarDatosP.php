<!--/
Documento PHP que recibe los datos generales de un usuario
por metodo POST y realiza la coneccion con la base de datos
modificando al usuario dado.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        $contrasena = $_REQUEST["clave"];
        $nombre = $_REQUEST["nombre"];
        $anno = $_REQUEST["anno"];
        $sexo = $_REQUEST["sexo"];
        $estado = $_REQUEST["estado"];
        $empresa = $_REQUEST["empresa"];


        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");

        $query = "UPDATE  persona SET nombrecompleto='$nombre', sexo='$sexo', fechaingresotec='$anno', contrasena='$contrasena', nombreempresa='$empresa', estadoacademico='$estado'  where usuario ='$usuario'";
        $query = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>"); 
        
        header("Location: ../PHPHTMLfiles/inicio.php");
    }