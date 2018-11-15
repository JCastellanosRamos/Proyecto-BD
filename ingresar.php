<?php

$Usuario = $_POST['Usuario'];
$Contrasena = $_POST['Contrasena'];
$Tipo_usuario = $_POST['Tipo_usuario'];

if(empty($Usuario) || empty($Contrasena)){
header("Location: login.html");
exit();
}

mysql_connect('localhost','ic15jcr','194125') or die("Error al conectar " . mysql_error());
mysql_select_db('ic15jcr') or die ("Error al seleccionar la Base de datos: " . mysql_error());

$result = mysql_query("SELECT * from Usuarios where Usuario='" . $Usuario . "'");

if($row = mysql_fetch_array($result)){
if($row['Contrasena'] == $Contrasena && $row['idTipo'] == $Tipo_usuario){
session_start();
$_SESSION['Usuario'] = $Usuario;
	if($Tipo_usuario == 2){
	header("Location: Usuario/menu.html");
	}
	if($Tipo_usuario == 1){
	header("Location: Administrador/menu.html");
	}
}
else{
header("Location: login.html");
exit();
}
}else{
header("Location: login.html");
exit();
}
?>