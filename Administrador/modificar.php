<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener el dato que se desea cambiar
	$Usuario =$_POST["Usuario"]; 
	$cambios = $_POST["cambios"];
	$nuevo = $_POST["nuevo"];




// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");

	$id="SELECT idUsuario FROM Usuarios WHERE Usuario='$Usuario'";
	$result1 = mysql_query($id) or die("Query failed");

	$registro = mysql_result($result1,0);

//Checar el campo que se desea cambiar

if($cambios == "nombre"){
  	
	$query = "UPDATE Usuarios SET Nombre = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result = mysql_query($query) or die("Query failed");

			              
}//if

if($cambios == "ap_paterno"){

	$query1 = "UPDATE Usuarios SET Ap_paterno = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result1 = mysql_query($query1) or die("Query 1 failed");
			              

}//if



if($cambios == "ap_materno"){

	$query2 = "UPDATE Usuarios SET Ap_materno = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result2 = mysql_query($query2) or die("Query 2 failed");
			              

}//if

	
if($cambios == "genero"){

	$query3 = "UPDATE Usuarios SET Genero = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result3 = mysql_query($query3) or die("Query 3 failed");
			              
}//if


	
if($cambios == "fecha_nacimiento"){

	$query4 = "UPDATE Usuarios SET Fecha_nacimiento = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result4 = mysql_query($query4) or die("Query 1 failed");
			              
}//if

if($cambios == "correo_electronico"){

	$query5 = "UPDATE Usuarios SET Correo_electronico = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result5 = mysql_query($query5) or die("Query 1 failed");
			              
}//if
	
if($cambios == "usuario"){

	$query6 = "UPDATE Usuarios SET Usuario = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result6 = mysql_query($query6) or die("Query 1 failed");
			              
}//if	

if($cambios == "contrasena"){

	$query7 = "UPDATE Usuarios SET Contrasena = '$nuevo' WHERE idUsuario = $registro";

	// Ejecutamos el query
	$result7 = mysql_query($query7) or die("Query 1 failed");
			              
}//if

// Cerramos la conexion
	 mysql_close($link);


 //Volvemos a la pagina principal
	header("Location: http://antares.dci.uia.mx/ic15jcr/Final/Administrador/menu.html");
	
?>
