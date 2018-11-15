<?php
//Programa para agregar al usuario en la base de datos
include"config.php";//Incluir programa donde esta la conexión de la base de datos

$Aplicacion =$_POST["Aplicacion"];

//conexion a la base de datos
// Nos conectamos a la base de datos
	  $link = mysql_pconnect($cfgServer['host'], $cfgServer['user'], $cfgServer['password']) or die("Could not connect to MySQL database");
	  
	  mysql_select_db($cfgServer['dbname']) or die("Could not select database");

	$id="SELECT idApp FROM Apps WHERE Aplicacion='$Aplicacion'";
	$result1 = mysql_query($id) or die("Query 34 failed");

	$registro = mysql_result($result1,0);

//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {

	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprobamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				$nombre = $_FILES['imagen']['name'];
				$query="INSERT INTO Imagenes_app(Imagen,idApp) VALUES('$nombre','$registro')";
				$result1 = mysql_query($query) or die("Query failed");
				echo "el archivo ha sido movido exitosamente";
			} 
			else {
				echo "ocurrio un error al mover el archivo.";
			}
		}
		else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} 
	else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}
mysql_close($link);

header("Location: http://antares.dci.uia.mx/ic15jcr/Final/Administrador/menu.html");
?>