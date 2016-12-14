<!--/
Documento PHP que recibe los datos necesarios para enviar un mensaje
de un usuario a un usuario receptor e insertandolo en la base de datos.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        $idReceptor = $_REQUEST["idUsuarioReceptor"];
        $msj = $_REQUEST["mensaje"];
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");
        
        $idUsuario = pg_query("SELECT idpersona FROM persona where usuario = '$usuario'");
        $rowIdUsuario = pg_fetch_row($idUsuario);
                
        
        $query1 = "insert into mensajeria (idusuarioemisor, idusuarioreceptor, mensaje) values ('$rowIdUsuario[0]', '$idReceptor', '$msj')";
        $result1 = pg_query($conn,$query1) or die ("<strong>Error durante la consulta.</strong>");
    }
?>
