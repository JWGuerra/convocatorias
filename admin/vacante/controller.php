<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}
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


function cleanContent($content)
{
	// Implementa aquí tu lógica de limpieza y validación del contenido
	$content = trim(preg_replace('[\n|\n\r]', '<br>', $content));
	$content = trim(preg_replace('[\r]', '', $content));
	return $content;
}

function doInsert()
{
	global $mydb;
	if (isset($_POST['save'])) {
		if ($_POST['IDCONVOCATORIA'] == "None") {
			$messageStats = false;
			message("Todos los campos son requeridos!", "error");
			redirect('index.php?view=add');
		} else {
			$sql = "SELECT * FROM tblServicio where IDSERVICIO = {$_POST['IDSERVICIO']}";
			$mydb->setQuery($sql);
			$cat = $mydb->loadSingleResult();
			$_POST['SERVICIO'] = $cat->SERVICIO;
			$vacante = new Vacante();
			$vacante->IDCONVOCATORIA		= $_POST['IDCONVOCATORIA'];
			$vacante->SERVICIO				= $_POST['SERVICIO'];
			$vacante->CATEGORIA				= $_POST['CATEGORIA'];
			$vacante->REMUNERACION		    = $_POST['REMUNERACION'];
			$vacante->FORMACIONACADEMICA	= $_POST['FORMACIONACADEMICA'];
			$vacante->NROVACANTES			= $_POST['NROVACANTES'];
			$vacante->DURACION				= $_POST['DURACION'];
			$vacante->EXPERIENCIAGENERAL	= $_POST['EXPERIENCIAGENERAL'];
			$vacante->EXPERIENCIAESPECIFICA	= $_POST['EXPERIENCIAESPECIFICA'];
			$vacante->FUNCIONES				= cleanContent($_POST['FUNCIONES']);
			$vacante->LUGARTRABAJO			= $_POST['LUGARTRABAJO'];
			$vacante->FECHAPUBLICACION			= date('Y-m-d H:i');
			$vacante->create();

			message("Nueva Vacante creada exitosamente!", "success");
			redirect("index.php");
		}
	}
}

function doEdit()
{
	global $mydb;
	if (isset($_POST['save'])) {
		if ($_POST['IDCONVOCATORIA'] == "None") {
			$messageStats = false;
			message("Todos los campos son requeridos!", "error");
			redirect('index.php?view=add');
		} else {
			$sql = "SELECT * FROM tblServicio where IDSERVICIO = {$_POST['IDSERVICIO']}";
			$mydb->setQuery($sql);
			$cat = $mydb->loadSingleResult();
			$_POST['SERVICIO'] = $cat->SERVICIO;
			$vacante = new Vacante();
			$vacante->IDCONVOCATORIA		= $_POST['IDCONVOCATORIA'];
			$vacante->SERVICIO				= $_POST['SERVICIO'];
			$vacante->CATEGORIA				= $_POST['CATEGORIA'];
			$vacante->REMUNERACION		    = $_POST['REMUNERACION'];
			$vacante->FORMACIONACADEMICA	= $_POST['FORMACIONACADEMICA'];
			$vacante->NROVACANTES			= $_POST['NROVACANTES'];
			$vacante->DURACION				= $_POST['DURACION'];
			$vacante->EXPERIENCIAGENERAL	= $_POST['EXPERIENCIAGENERAL'];
			$vacante->EXPERIENCIAESPECIFICA	= $_POST['EXPERIENCIAESPECIFICA'];
			$vacante->FUNCIONES				= cleanContent($_POST['FUNCIONES']);
			$vacante->LUGARTRABAJO			= $_POST['LUGARTRABAJO'];
			$vacante->update($_POST['IDVACANTE']);

			message("La vacante de trabajo se actualizó!", "success");
			redirect("index.php");
		}
	}
}

function doDelete()
{
	$id = $_GET['id'];
	$vacante = new Vacante();
	$vacante->delete($id);
	message("La vacante fue eliminada!", "info");
	redirect('index.php');
}
?>