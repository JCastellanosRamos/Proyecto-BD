<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos


//Obtener el dato que se desea cambiar
	$tipo_usuario =$_POST["tipo_usuario"]; 
	//$nuevo = $_POST["nuevo"];




// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");



//Hacer la busqueda

if($tipo_usuario == 1){
  	
	$query ="SELECT idUsuario, Nombre, Ap_paterno, Ap_materno, Genero, Correo_electronico, Fecha_Nacimiento, Usuario, Contrasena, Tipo FROM Usuarios LEFT JOIN Tipos_usuario t USING(idTipo) WHERE idTipo = 1";
	
	// Ejecutamos el query
	$result = mysql_query($query) or die("Query failed");

//Crear una tabla para poder mostrar el resultado de la busqueda

echo "<table border='1'>";  
echo "<tr>";  
echo "<th>ID</th>";  
echo "<th>Nombre</th>";  
echo "<th>Apellido Paterno</th>";  
echo "<th>Apellido Materno</th>"; 
echo "<th>Genero</th>";  
echo "<th>Correo electronico</th>";  
echo "<th>Fecha nacimiento</th>"; 
echo "<th>Usuario</th>";   
echo "<th>Contrasena</th>";
echo "<th>Tipo usuario</th>"; 
echo "</tr>";
  while ($registro = mysql_fetch_array($result)){  
 echo "<tr>";  
    echo "<td>$registro[0]</td>";  
    echo "<td>$registro[1]</td>";  
    echo "<td>$registro[2]</td>";  
    echo "<td>$registro[3]</td>";  
    echo "<td>$registro[4]</td>";  
    echo "<td>$registro[5]</td>"; 
    echo "<td>$registro[6]</td>";  
    echo "<td>$registro[7]</td>";  
    echo "<td>$registro[8]</td>";
    echo "<td>$registro[9]</td>"; 
    echo "</tr>";  
}  
echo "</table>";  
//mysqli_free_result($registro);	              
}//if

if($tipo_usuario == 2){
  	
	$query ="SELECT idUsuario, Nombre, Ap_paterno, Ap_materno, Genero, Correo_electronico, Fecha_Nacimiento, Usuario, Contrasena, Tipo FROM Usuarios LEFT JOIN Tipos_usuario t USING(idTipo) WHERE idTipo = 2";
	
	// Ejecutamos el query
	$result = mysql_query($query) or die("Query failed");

//Crear una tabla para poder mostrar el resultado de la busqueda

echo "<table border='1'>";  
echo "<tr>";  
echo "<th>ID</th>";  
echo "<th>Nombre</th>";  
echo "<th>Apellido Paterno</th>";
echo "<th>Apellido Materno</th>"; 
echo "<th>Genero</th>"; 
echo "<th>Correo electronico</th>";  
echo "<th>Fecha nacimiento</th>"; 
echo "<th>Usuario</th>";   
echo "<th>Contrasena</th>";
echo "<th>Tipo usuario</th>";   
echo "</tr>";
  while ($registro = mysql_fetch_array($result)){  
 echo "<tr>";  
    echo "<td>$registro[0]</td>";  
    echo "<td>$registro[1]</td>";  
    echo "<td>$registro[2]</td>";  
    echo "<td>$registro[3]</td>";  
    echo "<td>$registro[4]</td>";  
    echo "<td>$registro[5]</td>"; 
    echo "<td>$registro[6]</td>";  
    echo "<td>$registro[7]</td>";  
    echo "<td>$registro[8]</td>";
    echo "<td>$registro[9]</td>";  
    echo "</tr>";  
}  
echo "</table>";  
//mysqli_free_result($registro);	              
}//if

// Cerramos la conexion
	 mysql_close($link);


 //Volvemos a la pagina principal
	//header("Location: http://antares.dci.uia.mx/ic15jcr/MenuDes/menu.html");	
?>