<!--/
Documento PHP que recibe los datos necesarios para crear y cargar una publicacion
desde base de datos.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        $lenguaje = urlencode($_REQUEST["lenguaje"]);
        $descripcion = $_REQUEST["descripcion"];
        $codigo = $_REQUEST["codigo"];
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);

        $query = "SELECT idPersona FROM persona where usuario='$usuario'";
        $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");
        
        $row = pg_fetch_row($result);
        $query1 = "INSERT INTO publicidadCodigo (lenguaje, descripcion, textoCodigo, idUsuario) values ('$lenguaje', '$descripcion', '$codigo', '$row[0]')";
        $result1 = pg_query($conn,$query1) or die ("<strong>Error durante la consulta.</strong>");
        
        $query2 = "SELECT * FROM publicidadCodigo where idUsuario='$row[0]' order by idPublicacion desc";
        $result2 = pg_query($conn,$query2) or die ("<strong>Error durante la consulta.</strong>");
        $row2 = pg_fetch_row($result2);
        
        $query3 = "INSERT INTO foro (idPublicacion) values ('$row2[0]')";
        $result3 = pg_query($conn,$query3) or die ("<strong>Error durante la consulta.</strong>");
        
        $query4 = "SELECT * FROM publicidadCodigo where idUsuario='$row[0]' order by idPublicacion desc";
        $result4 = pg_query($conn,$query4) or die ("<strong>Error durante la consulta.</strong>");
        
        echo "<form class=\"form-horizontal\">
                <fieldset>

                <!-- Form Name -->
                <legend>Publicaciones</legend>";
        
        
        for(;$fila= pg_fetch_assoc($result4);){ 
            $idPubli = pg_field_name($result4,0);
            $leng = pg_field_name($result4,1);
            $descrip = pg_field_name($result4,2);
            $codig = pg_field_name($result4,3);
             echo "<div class=\"form-group\">
                    <label class=\"col-md-4 control-label\">Lenguaje :</label>
                    <div class=\"col-md-5\">
                        <label class=\"col-md-4 control-label\">$fila[$leng]</label>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-md-4 control-label\">Descripcion :</label>
                    <div class=\"col-md-5\">
                        <label class=\"col-md-8 control-label\">$fila[$descrip]</label>
                    </div>
                </div>
                <div class=\"form-group\">
                    <label class=\"col-md-4 control-label\">Codigo :</label> 
                    <div class=\"col-md-6\">                     
                        <textarea class=\"form-control\" >$fila[$codig]</textarea>
                    </div>
                </div>";
             
             echo "<button id=\"$fila[$idPubli]\" type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#modalComentar\" onclick = \"idPublicComentario(this)\">Comentar</button>
                </div>"
                 . "<hr style=\"color: #555\">";
         }
         echo "</fieldset></form>";
    }
?>
