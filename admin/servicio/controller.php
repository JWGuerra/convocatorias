
<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}

//Segun las acciones del usuario, se realiza el la operación CRUD correspondiente
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

//Funcion para crear Servicio
function doInsert()
{
	if (isset($_POST['save'])) {
		if ($_POST['SERVICIO'] == "") {
			$messageStats = false;
			message("Todos los campos son requeridos!", "error");
			redirect('index.php?view=add');
		} else {
			$servicio = new Servicio();
			$servicio->SERVICIO					= $_POST['SERVICIO'];
			$servicio->CATEGORIA				= $_POST['CATEGORIA'];
			$servicio->REMUNERACIONCATEGORIA	= $_POST['REMUNERACIONCATEGORIA'];
			$servicio->create();
			message("Nuevo servicio [" . $_POST['SERVICIO'] . "] creado existosamente!", "success");
			redirect("index.php");
		}
	}
}

//Funcion para actualizar servicio
function doEdit()
{
	if (isset($_POST['save'])) {
		$servicio = new Servicio();
		$servicio->SERVICIO					= $_POST['SERVICIO'];
		$servicio->CATEGORIA				= $_POST['CATEGORIA'];
		$servicio->REMUNERACIONCATEGORIA	= $_POST['REMUNERACIONCATEGORIA'];
		$servicio->update($_POST['IDSERVICIO']);
		message("El servicio [" . $_POST['SERVICIO'] . "] fue actualizado!", "success");
		redirect("index.php");
	}
}

//Funcion para eliminar un Servicio
function doDelete()
{
	$id = $_GET['id'];
	$servicio = new Servicio();
	$servicio->delete($id);
	message("El servicio fue eliminado!", "info");
	redirect('index.php');
}
?>