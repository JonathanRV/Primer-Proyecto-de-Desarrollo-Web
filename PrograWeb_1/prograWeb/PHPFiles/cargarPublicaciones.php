<!--/
Documento PHP que cargar todas las publicaciones desde la base de datos
a un usuario.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn);        
        
        $query2 = "SELECT * FROM publicidadCodigo order by idPublicacion desc";
        $result2 = pg_query($conn,$query2) or die ("<strong>Error durante la consulta.</strong>");
        
        
        echo "<form class=\"form-horizontal\">
                <fieldset>

                <!-- Form Name -->
                <legend>Publicaciones</legend>";
        
        
        for(;$fila= pg_fetch_assoc($result2);) {
            $idPubli = pg_field_name($result2,0);
            $leng = pg_field_name($result2,1);
            $descrip = pg_field_name($result2,2);
            $codig = pg_field_name($result2,3);
            $idUsua = pg_field_name($result2,4);
            
            //$fila[$idUsua]            
            $query = "SELECT * FROM persona where idPersona = '$fila[$idUsua]'";
            $result = pg_query($conn,$query) or die ("<strong>Error durante la consulta.</strong>");
            $row = pg_fetch_row($result);
            
             echo "<div class=\"form-group\">
                        <label class=\"col-md-4 control-label\">$row[1]</label>
                </div>
                <div class=\"form-group\">
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
                </div>"
                     . "<div class=\"form-group\">
                            <label class=\"col-md-4 control-label\">Comentarios </label>
                        </div>
                <div>";
             
            $query3 = "SELECT idForo FROM foro where idPublicacion = '$fila[$idPubli]'";
            $result3 = pg_query($conn,$query3) or die ("<strong>Error durante la consulta.</strong>");
            $row3 = pg_fetch_row($result3);
            
            $query4 = "SELECT * FROM comentarforo_usuario where idForo = '$row3[0]'";
            $result4 = pg_query($conn,$query4) or die ("<strong>Error durante la consulta.</strong>");
            
            for(;$fila2= pg_fetch_assoc($result4);){
                $comentForo = pg_field_name($result4,2);
                $idUsuaCome = pg_field_name($result4,1);
                
                $query5 = "SELECT * FROM persona where idPersona = '$fila2[$idUsuaCome]'";
                $result5 = pg_query($conn,$query5) or die ("<strong>Error durante la consulta.</strong>");
                $row5 = pg_fetch_row($result5);
                
                echo "<div class=\"form-group\">
                        <label class=\"col-md-4 control-label\">$row5[1] :</label>
                        <div class=\"col-md-5\"> 
                            <label class=\"col-md-8 control-label\">$fila2[$comentForo]</label>
                        </div>
                </div>";
            }
            echo "<button id=\"$fila[$idPubli]\" type=\"button\" class=\"btn btn-success\" data-toggle=\"modal\" data-target=\"#modalComentar\" onclick = \"idPublicComentario(this)\">Comentar</button>
                </div>"
                 . "<hr style=\"color: #555\">";
         }
         echo "</fieldset></form>";
    }
?>