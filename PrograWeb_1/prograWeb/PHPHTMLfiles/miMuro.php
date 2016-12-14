<!--
Interfaz que muestra las publicaciones propias de un usuario.
-->
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
        <script src="../JSFiles/Js.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body onload="cargarMuro(); autocompletadoLenguajes();">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="/PHPHTMLfiles/inicio.php">Blog TEC</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="inicio.php">Informacion</a></li>
                <li class="active"><a href="#">Mi Muro</a></li>
                <li><a href="/PHPHTMLfiles/muro.php">Foro</a></li>
                <li><a href="../PHPHTMLfiles/amigos.php">Amigos</a></li>
                <li style="position: Absolute; right:0%; top:0%"><a href="index.php" class="btn logout"><span class="glyphicon glyphicon-share"></span> Salir</a></li>
            </ul>
        </div>
        
        <div class="row" align="center">
            <div class="col-xs-6 col-sm-4 panel-footer">
                <form id="publicar" class="form-horizontal" action="javascript:publicarMuro()" methos="POST">
                        <fieldset>
                        <!-- Form Name -->
                        <legend>Publicar</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="lenguaje">Lenguaje Programacion</label>  
                            <div class="col-md-6">
                                <input list="lenguajes" id="lenguaje" name="lenguaje" type="text" placeholder="Lenguaje" class="form-control" required="">              
                                <datalist id="lenguajes"></datalist>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="descripcion">Descripcion</label>  
                            <div class="col-md-6">
                                <input id="descripcion" name="descripcion" type="text" placeholder="Descripcion Codigo" class="form-control" required="">
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="codigo">Codigo</label>
                            <div class="col-md-6">                     
                                <textarea class="form-control" id="codigo" name="codigo"></textarea>
                            </div>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="publicar"></label>
                            <div class="col-md-5">
                                <button type="submit" id="publicar" name="publicar" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                        </fieldset>
                    </form>
            </div>
            <div  class="col-xs-6 col-sm-6  panel-footer">
                <div  id="capaActualizableMuro">
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalComentarMiMuro" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Comentar</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div align="left">
                                <form class="form-horizontal" action="javascript:realizarComentarioMiMuro()" methos="POST">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Comentario</label>
                                        <div class="col-xs-9">
                                            <input name="comentario"  class="form-control"  id="comentario" placeholder="Comentario">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default">Enviar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <script src="../JSFiles/ajax.js"></script>
    </body>
</html>
