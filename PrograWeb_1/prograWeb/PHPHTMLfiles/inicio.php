<?php
    session_start();
    $_SESSION["nombreUsuario"];
?>
<!--
Pagina principal donde se muestran las funciones posibles del usuario
en interfaz.
-->
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
    <body onload="cargarPersonas(); cargarAmigos();">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="/PHPHTMLfiles/inicio.php">Blog TEC</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/PHPHTMLfiles/inicio.php">Informacion</a></li>
                <li><a href="/PHPHTMLfiles/miMuro.php">Mi Muro</a></li>
                <li><a href="/PHPHTMLfiles/muro.php">Foro</a></li>
                <li><a href="/PHPHTMLfiles/amigos.php">Amigos</a></li>
                <li style="position: Absolute; right:0%; top:0%"><a href="index.php" class="btn logout"><span class="glyphicon glyphicon-share"></span> Salir</a></li>
            </ul>
        </div>
        
        
        <label class="control-label" style="font-size: x-large">Información</label>
        <hr>
        <div class="row" align="left">
            <div class="col-xs-6 col-sm-3">
                <div style="height: 200px; width: 200px">
                    <img id="imagenUsuario" style="height: 100%; width: 100%" class="img-responsive">
                </div>
                <form action="../PHPFiles/cargarImagen.php" method="post" enctype="multipart/form-data">
                    <span class="btn btn-default btn-file glyphicon glyphicon-edit" aria-hidden="true">
                        <input id="foto" name="foto" type="file">
                    </span>
                    <button type="submit" class = "btn btn-default">Cambiar</button>
                </form>
            </div>
            <div class="col-xs-6 col-sm-6">
                <h3>Datos Personales</h3>
                <br>
                <form class="form-vertical">
                    <div>
                        <label class="text-primary" style="font-size: large "><strong>Usuario</strong></label>
                        <br>
                        <label  id="usuario" style="color: #000; font-size: large;"><strong><em></em></strong></label>
                        <br>
                        <label class="text-primary" style="font-size: large"><strong>Contraseña</strong></label>
                        <br>
                        <label id="clave" style="color: #000; font-size: larger"><strong><em></em></strong></label>
                        <hr>
                    </div>
                    <div>
                        <label class="text-primary" style="font-size: large"><strong>Nombre</strong></label>
                        <br>
                        <label id="nombre" style="color: #000; font-size: larger"><strong><em></em></strong></label>
                        <br>
                        <label class="text-primary" style="font-size: large"><strong>Año Ingreso</strong></label>
                        <br>
                        <label id="anno" style="color: #000; font-size: large"><strong><em></em></strong></label>
                        <br>
                        <label class="text-primary" style="font-size: large"><strong>Sexo</strong></label>
                        <br>
                        <label id="sexo" style="color: #000; font-size: large"><strong><em></em></strong></label>
                        <hr>
                    </div>
                    <div>
                        <label class="text-primary" style="font-size: large"><strong>Estado</strong></label>
                        <br>
                        <label id="estado" style="color: #000; font-size: large"><strong><em></em></strong></label>
                        <br>
                        <label class="text-primary" style="font-size: large"><strong>Empresa</strong></label>
                        <br>
                        <label id="empresa" style="color: #000; font-size: large"><strong><em></em></strong></label>
                        <hr>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="button" class="btn btn-primary" value="Actualizar Datos" data-toggle="modal" data-target="#modal2" onclick="cargarActualizar()">
                            <input type="submit" class="btn btn-primary" value="Ver mi Perfil">
                        </div>
                    </div>
                </form>
            </div>
  
            <div class="clearfix visible-xs-block"></div>
            <div id="capaActualizableAmigos" class="col-xs-6 col-sm-2 panel-footer" style="text-align:center" >
                                
            </div>
        </div>
        <div class="modal fade" id="modal2" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Actualizar Datos</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div align="left">
                                <form class="form-horizontal" action="../PHPFiles/actualizarDatosP.php" methos="POST">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Usuario</label>
                                        <div class="col-xs-9">
                                            <label name="usuario"  class="form-control"  id="inputUsuarioA" placeholder="Usuario">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Contraseña</label>
                                        <div class="col-xs-9">
                                            <input name="clave" class="form-control" id="inputPasswordA" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Nombre</label>
                                        <div class="col-xs-9">
                                            <input name="nombre" type="text" class="form-control" placeholder="Nombre Completo" id="inputNombreA">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Año Ingreso</label>
                                        <div class="col-xs-3">
                                            <select name="anno" class="form-control" id="inputAnnoA">
                                                <option>1988</option><option>1989</option><option>1990</option><option>1991</option><option>1992</option>
                                                <option>1992</option><option>1993</option><option>1994</option><option>1995</option><option>1996</option>
                                                <option>1997</option><option>1998</option><option>199</option><option>199</option><option>199</option>
                                                <option>199</option><option>1999</option><option>2000</option><option>2001</option><option>2002</option>
                                                <option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option>
                                                <option>2008</option><option>2009</option><option>2010</option><option>2012</option><option>2013</option>
                                                <option>2014</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Sexo</label>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="M" id="sexo_m"> Maculino
                                            </label>
                                        </div>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="F" id="sexo_f"> Femenino
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Estado</label>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="estado" value="Cursando" onclick="quitarEmpresa()" id="cursandoR"> Estudiante
                                            </label>
                                        </div>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="estado" value="Egresado" onclick="añadirEmpresa()" id="egresadoR"> Egresado
                                            </label>
                                        </div>
                                    </div>
                                    <div id='oculto' style='display:none;' class="form-group">
                                        <label class="control-label col-xs-3">Empresa</label>
                                        <div class="col-xs-9">
                                            <input name="empresa"  class="form-control"  id="inputEmpresaA" placeholder="Empresa">
                                        </div>
                                    </div>
                                    
                                    
                                    <br>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default">Actualizar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="chat">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <label id="tituloChat" class="modal-title control-label">Chat</label>
                    </div>
                <div id="capaActualizableChatModal">
                    
                </div>
                    
                <div class="modal-footer form-group">
                    <input id="mensj" type="text" class="form-control" placeholder="Mensaje">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-default" onclick="enviarMensaje()">Enviar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
                </div>
            </div>
        </div>
        
        
        <script src="../JSFiles/ajax.js"></script>
        <script src="../JSFiles/Js.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
