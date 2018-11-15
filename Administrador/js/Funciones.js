/*Esta funcion solo verifica que ya tenga el archivo seleccionado antes de cargarlo*/
function verificaForma(form){
		if((form.userfile.value == "") || (form.userfile.value == " ") || (form.userfile.value == "   ")){
			alert("Seleccione un archivo");
			return false;
		}

}
