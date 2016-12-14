<!--/
Documento PHP que carga una conversacion desde base de datos
de dos usuarios.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        $idReceptor = $_REQUEST["idUsuarioReceptor"];
                
                
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");
        
        $idUsuario = pg_query("SELECT idpersona FROM persona where usuario = '$usuario'");
        $rowIdUsuario = pg_fetch_row($idUsuario);
                
        
        $query1 = "SELECT * FROM mensajeria where idUsuarioEmisor='$rowIdUsuario[0]' and idUsuarioReceptor='$idReceptor' or idUsuarioEmisor='$idReceptor' and idUsuarioReceptor = '$rowIdUsuario[0]' order by idMensajeria";
        $result1 = pg_query($conn,$query1) or die ("<strong>Error durante la consulta.</strong>");
        
        
        while ( $row1 = pg_fetch_array($result1)){
            $usuarioP = pg_query("SELECT * FROM persona where idPersona = '$row1[1]'");
            $rowUsuario = pg_fetch_row($usuarioP);
            echo "<div class=\"form-group\">
                <label class=\"col-md-4 control-label\">$rowUsuario[1] :</label>
                <div class=\"col-md-8\">
                    <label class=\"row-md-4 control-label\">$row1[3]</label>
                </div></div>";
        }   
    }
?>
