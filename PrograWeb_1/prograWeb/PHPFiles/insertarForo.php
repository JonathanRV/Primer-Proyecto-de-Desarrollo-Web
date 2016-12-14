<!--/
Documento PHP que recibe datos necesarios para la insercion de un foro
en la base de datos.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        $idPublicacion = $_REQUEST["idPublicacion"];
        $comentario = $_REQUEST["comentario"];
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);

        $query = "SELECT idPersona FROM persona where usuario='$usuario'";
        $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");
        $row = pg_fetch_row($result);
        

        $query1 = "SELECT idForo FROM foro where idPublicacion='$idPublicacion'";
        $result1 = pg_query($conn,$query1) or die ("<strong>Error durante la consulta.</strong>");
        $row1 = pg_fetch_row($result1);
        
        $query2 = "INSERT INTO comentarforo_usuario (idForo, idUsuario, comentario) values ('$row1[0]', '$row[0]', '$comentario')";
        $result2 = pg_query($conn,$query2) or die ("<strong>Error durante la consulta.</strong>");
    }
?>