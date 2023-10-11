
<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}

// Se reciben los parámetros
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add':
		doInsert();
		break;

	case 'edit':
		doEdit();
		break;

	case 'delete':
		doDelete();
		break;
}

// Función para insertar una convocatoria
function doInsert()
{
	if (isset($_POST['save'])) {
		if ($_POST['CONVOCATORIA'] == "") {
			$messageStats = false;
			message("Todos los campos son requeridos", "error");
			redirect('index.php?view=add');
		} else {
			$convocatoria 	= new Convocatoria();
			$nro			= $_POST['NROCONVOCATORIA'];
			$anio			= $_POST['ANIO'];
			$convocatoria->NROCONVOCATORIA		= $_POST['NROCONVOCATORIA'];
			$convocatoria->ANIO					= $_POST['ANIO'];
			$convocatoria->CONVOCATORIA	        = "Convocatoria" . "-" . $nro . "-" . $anio;
			$convocatoria->create();
			message("Nueva convocatoria creada exitosamente!", "success");
			redirect("index.php");
		}
	}
}

// Función para editar una convocatoria
function doEdit()
{
	if (isset($_POST['save'])) {
		$convocatoria = new Convocatoria();
		$nro		  = $_POST['NROCONVOCATORIA'];
		$anio		  = $_POST['ANIO'];
		$convocatoria->NROCONVOCATORIA		= $_POST['NROCONVOCATORIA'];
		$convocatoria->ANIO					= $_POST['ANIO'];
		$convocatoria->CONVOCATORIA	        = "Convocatoria" . "-" . $nro . "-" . $anio;
		$convocatoria->update($_POST['IDCONVOCATORIA']);
		message("La convocatoria fue actualizada exitosamente!", "success");
		redirect("index.php");
	}
}

// Función para eliminar una Convocatoria
function doDelete(){
	$id = $_GET['id'];
	$convocatoria = new Convocatoria();
	$convocatoria->delete($id);
	message("La convocatoria [" . $id . "] fue eliminada!", "info");
	redirect('index.php');
}
?>