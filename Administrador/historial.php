<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener el dato que se desea cambiar
	$Usuario =$_POST["Usuario"]; 
	//$nuevo = $_POST["nuevo"];




// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");



//Hacer la busqueda

	$id="SELECT idUsuario FROM Usuarios WHERE Usuario='$Usuario'";
	$result1 = mysql_query($id) or die("Query failed");

	$registro = mysql_result($result1,0);
  	
	$query ="SELECT Usuario, Nombre, Ap_paterno, Ap_materno, Busqueda, Fecha_busqueda FROM Busquedas RIGHT JOIN Usuarios USING(idUsuario) LEFT JOIN Tipos_usuario t USING(idTipo) WHERE idUsuario = '$registro'";

	// Ejecutamos el query
	$result = mysql_query($query) or die("Query failed");

//Crear una tabla para poder mostrar el resultado de la busqueda

echo "<table border='1'>";  
echo "<tr>"; 
echo "<th>Usuario</th>"; 
echo "<th>Nombre</th>";  
echo "<th>Apellido Paterno</th>";  
echo "<th>Apellido Materno</th>";  
echo "<th>Busqueda</th>";  
echo "<th>Fecha_busqueda</th>";  
echo "</tr>";
  while ($registro = mysql_fetch_array($result)){  
 echo "<tr>";  
    echo "<td>$registro[0]</td>";  
    echo "<td>$registro[1]</td>";  
    echo "<td>$registro[2]</td>";  
    echo "<td>$registro[3]</td>";  
    echo "<td>$registro[4]</td>"; 
    echo "<td>$registro[5]</td>"; 
    echo "</tr>";  
}  
echo "</table>";  
//mysqli_free_result($registro);	              

// Cerramos la conexion
	 mysql_close($link);


 //Volvemos a la pagina principal
	//header("Location: http://antares.dci.uia.mx/ic15jcr/MenuDes/menu.html");	
?>