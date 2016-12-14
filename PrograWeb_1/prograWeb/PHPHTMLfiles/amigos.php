<!--/
Interfaz de busquedad de amigos
/-->

<?php
    session_start();
    $_SESSION["nombreUsuario"];
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap-theme.css"/>
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap-theme.css.map"/>
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css"/>
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css.map"/>
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css"/>
        
    </head>
    <body>
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="/PHPHTMLfiles/inicio.php">Blog TEC</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/PHPHTMLfiles/inicio.php">Informacion</a></li>
                <li><a href="/PHPHTMLfiles/miMuro.php">Mi Muro</a></li>
                <li><a href="../PHPHTMLfiles/muro.php">Foro</a></li>
                <li class="active"><a href="/PHPHTMLfiles/amigos.php">Amigos</a></li>
                <li style="position: Absolute; right:0%; top:0%"><a href="index.php" class="btn logout"><span class="glyphicon glyphicon-share"></span> Salir</a></li>
            </ul>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                        <h2>Buscar Amigos</h2>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input name="inputBuscar" id="inputBuscar" type="text" class="form-control input-lg" placeholder="Buscar" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="button" onclick="cargarNombreAmigo()">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div id="capaActualizableAmigosBuscar"></div>
        <script src="../JSFiles/ajax.js"></script>
    </body>
</html>