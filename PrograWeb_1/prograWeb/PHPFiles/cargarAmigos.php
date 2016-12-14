<!--/
Documento PHP que carga desde base de datos los amigos que posee
el usuario actual.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);
    
        $query = "SELECT * FROM persona where usuario = '$usuario'";
        $result = pg_query($conn, $query) or die ("<strong>Error durante la consulta.</strong>");
        $row = pg_fetch_row($result);
        
        $query1 = "SELECT * FROM usuario_usuario where idUsuarioEmisor = '$row[0]'";
        $result1 = pg_query($conn, $query1) or die ("<strong>Error durante la consulta.</strong>");
        
        while ( $row1 = pg_fetch_array($result1)){
            
            $query2 = "SELECT * FROM persona where idPersona = '$row1[1]'";
            $result2 = pg_query($conn, $query2) or die ("<strong>Error durante la consulta.</strong>");
            $row2 = pg_fetch_row($result2);
            echo "<div  class=\"row\" align=\"rigth\">
                    <span  aria-hidden=\"true\">
                    <button id=\"$row2[0]\" name=\"$row2[1]\" style=\"height: 60px; width: 220px\" data-toggle=\"modal\" data-target=\"#chat\" onclick = \"chatAmigo(this)\">
                        <div>
                            <label class= \" col-md-8 control-label\">$row2[1]</label>
                            <div class=\"col-md-4\">
                            <div style=\"height: 50px; width: 50px\">
                                <img align =\"left\" src=\"../PHPFiles/$row2[8]\" style=\"height: 100%; width: 100%\" class=\"img-responsive\">
                            </div>
                            </div>
                        </div>
                    </button>
                </span>"
                . "</div>";
        }
    }
?>

