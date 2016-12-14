<?php
    session_start();
    unset( $_SESSION["nombreUsuario"]);
?>
<!--
Interfaz del login de la aplicacion.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css"/>
        <script src="../JSFiles/Js.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        
        
    </head>
    <body>
        <div class="wrapper">
            <form class="form-signin" action="../PHPFiles/loginP.php" methos="POST">       
                <h2 class="form-signin-heading">Login</h2>
                <input type="text" class="form-control" name="username" placeholder="Usuario" required="" autofocus="" />
                <br>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required=""/>  
                <br>
                <div>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Registrarse</button>
                </div>
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
            </form>
        </div>
        <

        
        <!--
        Modal para registrar personas
        -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Registrarse</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div align="left">
                                <form class="form-horizontal" action="../PHPFiles/registrarseP.php" methos="POST">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Usuario</label>
                                        <div class="col-xs-9">
                                            <input name="usuario"  class="form-control"  id="inputEmail" placeholder="Usuario">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Contraseña</label>
                                        <div class="col-xs-9">
                                            <input name="clave" type="password" class="form-control" id="inputPassword" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Nombre</label>
                                        <div class="col-xs-9">
                                            <input name="nombre" type="text" class="form-control" placeholder="Nombre Completo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Año Ingreso</label>
                                        <div class="col-xs-3">
                                            <select name="anno" class="form-control">
                                                <option>1988</option><option>1989</option><option>1990</option><option>1991</option><option>1992</option>
                                                <option>1993</option><option>1994</option><option>1995</option><option>1996</option><option>1997</option>
                                                <option>1998</option><option>1999</option><option>2000</option><option>2001</option><option>2002</option>
                                                <option>2003</option><option>2004</option><option>2005</option><option>2006</option><option>2007</option>
                                                <option>2008</option><option>2009</option><option>2010</option><option>2011</option>
                                                <option>2012</option><option>2013</option><option>2014</option><option>2015</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-xs-3">Sexo</label>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="M"> Maculino
                                            </label>
                                        </div>
                                        <div class="col-xs-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="sexo" value="F"> Femenino
                                            </label>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default">Registrarse</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>