<!--/
Documento PHP que guarda la imagen al servidor y base de datos
de un usuario.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        $nom = $usuario.".png";
        
        copy($_FILES['foto']['tmp_name'], $_FILES['foto']['name']=$nom);
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);

        $query = "UPDATE persona SET imagen='$nom' where usuario='$usuario'";
        $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");
        
        header("Location: ../PHPHTMLfiles/inicio.php");
    }
?>