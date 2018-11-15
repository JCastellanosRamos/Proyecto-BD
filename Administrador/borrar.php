<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener datos de la forma
  $Aplicacion = $_POST["Aplicacion"];


// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");

	 $id="SELECT idApp FROM Apps WHERE Aplicacion='$Aplicacion'";
	$result1 = mysql_query($id) or die("Query failed");

	$registro = mysql_result($result1,0);
	  	
	  $query = "DELETE FROM Apps WHERE idApp = '$registro'";
		
	// Ejecutamos el query
	$result = mysql_query($query) or die("Query 1 failed");
			          
	 	
	 // Cerramos la conexion
	 mysql_close($link);

 //Volvemos a la pagina principal
	header("Location: http://antares.dci.uia.mx/ic15jcr/Final/Administrador/menu.html");
	
?>
