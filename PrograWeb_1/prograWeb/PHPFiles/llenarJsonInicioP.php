<?php
    session_start();
    if (isset( $_SESSION["nombreUsuario"]))
    {
        $usuario = ($_SESSION["nombreUsuario"]);
        $conn = pg_connect("host=localhost port=5432 dbname=blogTec user=postgres password=12345");
        $result = pg_query($conn, "select * from persona where usuario = '$usuario'");
        print json_encode(pg_fetch_all($result));
    }
?>  

    