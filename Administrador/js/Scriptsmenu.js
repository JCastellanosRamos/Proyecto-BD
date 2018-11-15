var xmlhttp;

// ========================================================================
//
// 	FUNCIONES DE AJAX
// 
// ========================================================================
function GetXmlHttpObject(){
	if (window.XMLHttpRequest){
	// code for IE7+, Firefox, Chrome, Opera, Safari
  		return new XMLHttpRequest();
	}

	if (window.ActiveXObject){
	// code for IE6, IE5
  		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function Contenido(contenido){
		
	//var params = "nombre="+nombre+"&numero="+numero;
	
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null){
  		alert ("Browser does not support HTTP Request");
		return false;
	}

	var url = "";
	var valor = 'hola';
	var valor2 = 'mundo';
	
	var params = 'parametro='+valor+'&parametro1='+valor2;
	
	if (contenido == 1) {
		url = "./Contenido1.php";
	}
	else if (contenido == 2) {
		url = "./Contenido2.php";
	}
	else if (contenido == 3) {
		url = "./Contenido3.php";
	}
        else if (contenido == 4) {
		url = "./Contenido4.php";
	}
        else if (contenido == 5) {
		url = "./Contenido5.php";
	}
	else if (contenido == 6) {
		url = "./Contenido6.php";
	}
	else if (contenido == 7) {
		url = "./Contenido7.php";
	}
	else if (contenido == 8) {
		url = "./Contenido8.php";
	}
	else if (contenido == 9) {
		url = "./Contenido9.php";
	}
	xmlhttp.onreadystatechange = muestraContenido;
	
	//xmlhttp.open("POST",url,true);
		
	//Cambiamos los headers para mandar la informacion de los parametros como si fuera una forma
	//xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//xmlhttp.setRequestHeader("Content-length", params.length);
	//xmlhttp.setRequestHeader("Connection", "close");
		
	//xmlhttp.send(params);
	
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	
	return true;
}// editarPerfil

function muestraContenido(){
	if (xmlhttp.readyState == 4){
		if(xmlhttp.status == 200){		
			var respuesta = xmlhttp.responseText;
			document.getElementById("contenido").innerHTML = respuesta;
		}// if status
		if (xmlhttp.status == 404){
			alert('La pagina no existe');
		}
	}// if readyState
}// muestraEditarUsuario
