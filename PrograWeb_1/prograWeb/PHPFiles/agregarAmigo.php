<!--/
Documento PHP que recibe los datos necesarios para agregar a un amigo y
realiza la conexion con la base de datos e inserta la relacion de amistad
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        $receptor = $_REQUEST["amigo"];
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");
        
        $idUsuario = pg_query("SELECT idpersona FROM persona where usuario = '$usuario'");
        $rowIdUsuario = pg_fetch_row($idUsuario);
        $idReceptor = pg_query("SELECT idpersona FROM persona where nombrecompleto = '$receptor'");
        $rowIdReceptor = pg_fetch_row($idReceptor);        
        
        
        $query1 = "insert into usuario_usuario (idusuarioemisor, idusuarioreceptor, estado) values ('$rowIdUsuario[0]', '$rowIdReceptor[0]', 'amigo')";
        $result = pg_query($conn,$query1) or die ("<strong>Error durante la consulta.</strong>");
        $query2 = "insert into usuario_usuario (idusuarioemisor, idusuarioreceptor, estado) values ('$rowIdReceptor[0]', '$rowIdUsuario[0]', 'amigo')";
        $result1 = pg_query($conn,$query2) or die ("<strong>Error durante la consulta.</strong>");    
        
    }
?>