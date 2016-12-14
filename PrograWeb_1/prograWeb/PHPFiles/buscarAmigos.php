<!--/
Documento PHP que recibe datos para realizar busqueda en la base de datos por 
generacion, nombre y empresa donde trabaja.
/-->
<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        
        $nombre = $_REQUEST["inputBuscar"];
        
        $strconn="host=localhost port=5432 dbname=blogTec user=postgres password=12345";
        $conn=pg_connect($strconn) or die ("<strong>Ha ocurrido un error en el acceso a la base de datos.</strong>");
        
        $resultNombre = pg_query("SELECT nombrecompleto, imagen FROM persona where nombrecompleto = '$nombre'");
        $resultEmpresaBuscar = pg_query("SELECT nombrecompleto, imagen FROM persona where nombreempresa = '$nombre'");
        $resultGeneracion = pg_query("SELECT nombrecompleto, imagen FROM persona where fechaingresotec = '$nombre'");
        
        if ($resultNombre2 =  pg_fetch_row($resultNombre))
        {
            echo "  <div class=\"row\" align=\"left\">
                        <div class=\"col-sm-7\" style=\"text-align:center\" >
                            <div id=\"capaActualizableAmigosInicio\">
                                <img src=\"../PHPFiles/$resultNombre2[1]\" style=\"height: 55px; width: 55px\" class=\"img-thumbnail\">
                                <label id=\"nombre\" style=\"color: #555; font-size: larger\">$resultNombre2[0]<em></em></label><button id=\"$resultNombre2[0]\" onclick=\"añadirAmigo(this)\" type=\"button\" class=\"btn btn-default\"><span  aria-hidden=\"true\" class=\"glyphicon glyphicon glyphicon-plus\">
                                <br>
                            </div>
                        </div>
                    </div>";
        }
        
        if ($resultEmpresaBuscar)
        {
            while ($resultEmpresaBuscar2 = pg_fetch_array($resultEmpresaBuscar)){
                echo "  <div class=\"row\" align=\"left\">
                            <div class=\"col-sm-7\" style=\"text-align:center\" >
                                <div id=\"capaActualizableAmigosInicio\">
                                    <img src=\"../PHPFiles/$resultEmpresaBuscar2[1]\" style=\"height: 55px; width: 55px\" class=\"img-thumbnail\">
                                    <label id=\"nombre\" style=\"color: #555; font-size: larger\">$resultEmpresaBuscar2[0]<em></em></label><button id=\"$resultEmpresaBuscar2[0]\" onclick=\"añadirAmigo(this)\" type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\"><span  aria-hidden=\"true\" class=\"glyphicon glyphicon glyphicon-plus\">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>";
            }
        }
        
        if ($resultGeneracion)
        {
            while ($resultGeneracion2 = pg_fetch_array($resultGeneracion)){
                echo "  <div class=\"row\" align=\"left\">
                            <div class=\"col-sm-7\" style=\"text-align:center\" >
                                <div id=\"capaActualizableAmigosInicio\">
                                    <img style=\"height: 55px; width: 55px\" src=\"../PHPFiles/$resultGeneracion2[1]\" class=\"img-thumbnail\">
                                    <label id=\"nombre\" style=\"color: #555; font-size: larger\">$resultGeneracion2[0]<em></em></label><button id=\"$resultGeneracion2[0]\" onclick=\"añadirAmigo(this)\" type=\"button\" class=\"btn btn-default\"><span  aria-hidden=\"true\" class=\"glyphicon glyphicon glyphicon-plus\">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>";
            }
        }
    }
    
    