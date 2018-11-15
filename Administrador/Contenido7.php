<?php
require_once "HTML/Template/ITX.php";
	
	// ========================================================================
	
	// 	Cargamos el template y desplegamos la pagina 
	// 	del staff
	// 
	// ========================================================================
	$template = new HTML_Template_ITX('./templates');
	$template->loadTemplatefile("./tipo.html", true, true);
	
	//$parametro = $_POST['parametro'];
	//$param1 = $_POST['parametro1'];
	
	//$template->setVariable("ETIQUETA", "$parametro $param1");
	
	$template->setVariable("ETIQUETA", " ");
	
	$template->parseCurrentBlock();
	
	$template->show();


?>