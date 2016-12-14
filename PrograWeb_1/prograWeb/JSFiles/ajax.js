function obtenerXHR ()
{  
    var req = false; 
    if(window.XMLHttpRequest) 
    { 
        req = new XMLHttpRequest(); 
    }     
    else 
    { 
        if(ActiveXObject) 
        { 
            var vectorVersiones = ["MSXML2.XMLHttp.5.0", "MSXML2.XMLHttp.4.0", "MSXML2.XMLHttp.3.0","MSXML2.XMLHttp", "Microsoft.XMLHttp"]; 
            for(var i=0; i < vectorVersiones.lengt; i++) 
            { 
                try 
                { 
                    req = new ActiveXObject(vectorVersiones[i]); 
                    return req; 
                } 
                catch(e) 
                {} 
            } 
        } 
    } 
    return req; 
} 

function cargarAjax(metodo,url,sync,capaContenido){
    
    var peticion = new XMLHttpRequest(); 
    peticion.open(metodo, url, sync); 
    peticion.onreadystatechange=function () 
    {
        if (peticion.readyState===4)
        {
            if(peticion.status===200)
            {
                document.getElementById(capaContenido).innerHTML=peticion.responseText;             
            }
            else
            {
                console.log("Error de la petición: "+peticion.status);
            }
        }    
        else 
        {             
            console.log("Estado de la Petición: "+peticion.readyState); 
        }
    };    
    peticion.send(null);
}

//Metodo que muestras las sugerencias de los lenguajes de programacion por metodo ajax.
function sugerencias(str)
{
    if (str.length==0) { 
        document.getElementById("lenguaje").innerHTML="";
        return;
    } 
    else {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","gethint.php?q="+str,true);
        xmlhttp.send();
    }    
}

var jsonPersonas

//carga los datos del usuario actual por metodo ajax.
function cargarPersonas()
{
    var peticion = obtenerXHR();
    peticion.open("GET", "../PHPFiles/llenarJsonInicioP.php", true);
    peticion.onreadystatechange=function () 
    {
        if (peticion.readyState===4)
            if(peticion.status===200)
            {
                
                jsonPersonas=eval("("+ peticion.responseText +")");
                reg=jsonPersonas[0];
                
                document.getElementById("usuario").innerHTML =reg.usuario;
                document.getElementById("clave").innerHTML =reg.contrasena;
                document.getElementById("nombre").innerHTML =reg.nombrecompleto;
                document.getElementById("anno").innerHTML =reg.fechaingresotec;
                document.getElementById("sexo").innerHTML =reg.sexo;
                document.getElementById("estado").innerHTML =reg.estadoacademico;
                document.getElementById("empresa").innerHTML =reg.nombreempresa
                
                if(reg.imagen === null){
                    document.getElementById("imagenUsuario").src = "../PHPFiles/avatarDefault.png";
                }
                else{
                    document.getElementById("imagenUsuario").src = "../PHPFiles/"+reg.imagen;
                }
            }

    };    
    peticion.send();     
}

//toma la imagen seleccionada por el usuario y llama el metodo cargarAjax
//que se encarga de guardar en la base de datos.
function cargarImagen(){
    
    var imagenUsuario = document.getElementById("foto").value;
    cargarAjax('GET', '../PHPFiles/cargarImagen.php?imagenUsuario='+imagenUsuario, true, 'capaActualizableImagen');
}

//Toma los valores necesarios para publicar por metodo ajax
//y los almacena en la base de datos por medio del archivo publicarMiMuro.php
function publicarMuro(){
    
    var lenguaje = document.getElementById("lenguaje").value;
    var descripcion = document.getElementById("descripcion").value;
    var codigo = document.getElementById("codigo").value;
    
    
    cargarAjax('GET', '../PHPFiles/publicarMiMuro.php?lenguaje='+lenguaje+'&descripcion='
            +descripcion+'&codigo='+codigo, true, 'capaActualizableMuro');
    
    document.getElementById("publicar").reset();
}

//Toma los valores necesarios para publicar y cargar por metodo ajax
//y los almacena en la base de datos por medio del archivo publicarMiMuro.php
function publicarMuroAux(){
    
    var lenguaje = document.getElementById("lenguaje").value;
    var descripcion = document.getElementById("descripcion").value;
    var codigo = document.getElementById("codigo").value;
    
    
    cargarAjax('GET', '../PHPFiles/publicarMiMuro.php?lenguaje='+lenguaje+'&descripcion='
            +descripcion+'&codigo='+codigo, true, 'capaActualizableMuro');
    cargarAjax('GET', '../PHPFiles/cargarPublicaciones.php', true, 'capaActualizableMuro');
    
    document.getElementById("publicar").reset();
}

//Carga las publicaciones por ajax en el muro del usuario actual
function cargarMuro(){
    
    cargarAjax('GET', '../PHPFiles/cargarMiMuro.php', true, 'capaActualizableMuro');
}

//carga las publicaciones de todos por ajax en un foro
function cargarPublicaciones(){
    
    cargarAjax('GET', '../PHPFiles/cargarPublicaciones.php', true, 'capaActualizableMuro');
}

var idPublicidad;

//Metodo que guarda idPublicacion en variable global
function idPublicComentario(idPublicacion){
    
    idPublicidad = idPublicacion.id;
}

//Metodo que realiza comentario desde un foro
//Insertando datos por Ajax
function realizarComentario(){
    
    var idPublicacion = idPublicidad;
    var comentario = document.getElementById("comentario").value;
    
    console.log(idPublicacion);
    console.log(comentario);
    
    document.getElementById("comentario").value="";
    cargarAjax('GET', '../PHPFiles/insertarForo.php?idPublicacion='+idPublicacion+'&comentario='+comentario, true, 'capaActualizableMuroAux');
    cargarAjax('GET', '../PHPFiles/cargarPublicaciones.php', true, 'capaActualizableMuro');
}

//Metodo que realiza comentario desde el muro del usuario actual
//Insertando datos por Ajax
function realizarComentarioMiMuro(){
    
    var idPublicacion = idPublicidad;
    var comentario = document.getElementById("comentario").value;
    
    console.log(idPublicacion);
    console.log(comentario);
    
    document.getElementById("comentario").value="";
    cargarAjax('GET', '../PHPFiles/insertarForo.php?idPublicacion='+idPublicacion+'&comentario='+comentario, true, 'capaActualizableMuroAux');
    cargarAjax('GET', '../PHPFiles/cargarMiMuro.php', true, 'capaActualizableMuro');
}

//Metodo que carga los amigos del usuario actual
//llamando la funcion ajax
function cargarAmigos(){
    
    cargarAjax('GET', '../PHPFiles/cargarAmigos.php', true, 'capaActualizableAmigos');
}

//Metodo que carga el nombre de los amigos del usuario actual
//llamando la funcion ajax
function cargarNombreAmigo(){
    
    var x = document.getElementById("inputBuscar").value;
    cargarAjax('GET', '../PHPFiles/buscarAmigos.php?inputBuscar='+x, true, 'capaActualizableAmigosBuscar');
    
}

//Metodo que agrega a un amigo alusuario actual
//llamando la funcion ajax
//Recibe el nombre persona
function añadirAmigo(nombrePers)
{
    console.log(nombrePers.id);
    cargarAjax('GET', '../PHPFiles/agregarAmigo.php?amigo='+nombrePers.id, true, 'capaActualizableAmigosBuscar');
}

var idUsuaReceptor;

//Metodo que carga la conversacion del usuario actual con un amigo
//llamando la funcion ajax
function chatAmigo(persona){
     
     idUsuaReceptor = persona.id;
     cargarAjax('GET', '../PHPFiles/cargarMensaje.php?idUsuarioReceptor='+idUsuaReceptor, true, 'capaActualizableChatModal');
}

//Metodo que envia y carga un mensaje del usuario actual a un usuario receptor
//llamando la funcion ajax
function enviarMensaje(){
    
    var mensaje = document.getElementById("mensj").value;
    document.getElementById("mensj").value = "";
    cargarAjax('GET', '../PHPFiles/chatAmigo.php?idUsuarioReceptor='+idUsuaReceptor+'&mensaje='+mensaje, true, 'capaActualizableChatModal');
    cargarAjax('GET', '../PHPFiles/cargarMensaje.php?idUsuarioReceptor='+idUsuaReceptor, true, 'capaActualizableChatModal');
}

//Metodo que carga el nombre de los lenguajes de programacion utilizando ajax
function autocompletadoLenguajes(){
    
    var dataList = document.getElementById('lenguajes');
    var input = document.getElementById('lenguaje');

    // Create a new XMLHttpRequest.
    var request = new XMLHttpRequest();

    // Handle state changes for the request.
    request.onreadystatechange = function(response) {
    if (request.readyState === 4) {
        if (request.status === 200) {
          // Parse the JSON
            var jsonOptions = JSON.parse(request.responseText);

            // Loop over the JSON array.
            jsonOptions.forEach(function(item) {
            // Create a new <option> element.
            var options = document.createElement('OPTION');
            // Set the value using the item in the JSON array.
            options.value = item;
            // Add the <option> element to the <datalist>.
            dataList.appendChild(options);
          });

          // Update the placeholder text.
            input.placeholder = "Lenguajes";
        } 
        else {
          // An error occured :(
            input.placeholder = "No se cargaron los lenguajes";
        }
      }
    };
    // Update the placeholder text.
    input.placeholder = "Cargando...";
    // Set up and make the request.
    request.open('GET', '../JSONFiles/lenguajes.json', true);
    request.send();
}

//Metodo que carga los datos actualizados del usuario actual
//llamando la funcion ajax
function cargarActualizar()
{
    var peticion = obtenerXHR();
    peticion.open("GET", "../PHPFiles/llenarJsonInicioP.php", true);
    peticion.onreadystatechange=function () 
    {
        if (peticion.readyState===4)
            if(peticion.status===200)
            {
                
                jsonPersonas=eval("("+ peticion.responseText +")");
                reg=jsonPersonas[0];
                
                document.getElementById("inputUsuarioA").innerHTML =reg.usuario;
                document.getElementById("inputPasswordA").value =reg.contrasena;
                document.getElementById("inputNombreA").value =reg.nombrecompleto;
                document.getElementById("inputAnnoA").value =reg.fechaingresotec;
                if(reg.sexo === "F"){
                    document.getElementById('sexo_f').checked = true;
                }
                if(reg.sexo === "M"){
                    document.getElementById('sexo_m').checked = true;
                }
                if(reg.sexo === "Cursando"){
                    document.getElementById('cursandoR').checked = true;
                }
                if(reg.sexo === "Egresado"){
                    document.getElementById('egresadoR').checked = true;
                }
                document.getElementById("inputEmpresaA").value =reg.nombreempresa;
            }

    };    
    peticion.send();     
}

//Metodo que hace visible un div con sus elementos
function añadirEmpresa()
{
    document.getElementById('oculto').style.display = 'block';
}

//Metodo que oculta un div con sus elementos
function quitarEmpresa()
{
    document.getElementById('oculto').style.display = 'none';
}