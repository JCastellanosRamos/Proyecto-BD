<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener datos de la forma
  $nombre = $_POST["nombre"];
  $ap_paterno = $_POST["ap_paterno"];
  $ap_materno = $_POST["ap_materno"];
  $genero = $_POST["genero"];
  $direccion = $_POST["direccion"];
  $fecha_nacimiento = $_POST["fecha_nacimiento"];
  $correo_electronico = $_POST["correo_electronico"];
  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];
  $tipo_usuario = $_POST["tipo_usuario"];





// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");
	  	
	  $query = "INSERT INTO Usuarios(Usuario,Contrasena,Nombre,Ap_paterno,Ap_materno,Genero,Correo_electronico,Fecha_nacimiento,idTipo) VALUES ('$usuario', '$contrasena', '$nombre','$ap_paterno', '$ap_materno', '$genero', '$correo_electronico', '$fecha_nacimiento', '$tipo_usuario')";
		
	// Ejecutamos el query
	$result = mysql_query($query) or die("Query 1 failed");
			          
	 	
	 // Cerramos la conexion
	 mysql_close($link);

 //Volvemos a la pagina principal
	header("Location: http://antares.dci.uia.mx/ic15jcr/Final/Administrador/menu.html");
	
?>
