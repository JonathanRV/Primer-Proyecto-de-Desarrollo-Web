<?php
    session_start();
    if (isset($_REQUEST["username"]))
    {
        $usuario=$_REQUEST["username"];
        $clave=$_REQUEST["password"];
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);

        $query = "Select * from persona where usuario='$usuario' and contrasena='$clave'";
        $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");

        $_SESSION["nombreUsuario"]="$usuario";
        
        if (!$row = pg_fetch_array($result)){
          header("Location: ../PHPHTMLfiles/index.php" );
        }
        else{
           header("Location: ../PHPHTMLfiles/inicio.php");
        }
    }
?>
<!--
Documento PHP que valida la existencia de usuario en la
base de datos.
-->