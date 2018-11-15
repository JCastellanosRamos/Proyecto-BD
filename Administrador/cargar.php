<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener datos de la forma
  $nombre = $_POST["nombre"];
  $descripcion = $_POST["descripcion"];
  $fecha_salida = $_POST["fecha_salida"];
  $desarrollador = $_POST["desarrollador"];
  $categoria = $_POST["categoria"];





// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");
	  	
	  $query = "INSERT INTO Apps(Aplicacion,Descripcion,Fecha_salida,idDesarrollador,idCategoria) VALUES ('$nombre', '$descripcion', '$fecha_salida','$desarrollador', '$categoria')";
		
	// Ejecutamos el query
	$result = mysql_query($query) or die("Query 1 failed");
			          
	 	
	 // Cerramos la conexion
	 mysql_close($link);

 //Volvemos a la pagina principal
	header("Location: http://antares.dci.uia.mx/ic15jcr/Final/Administrador/menu.html");
	
?>
