
<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}

// Se recibe la varible de list.php
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

// Función para agregar un comunicado
function doInsert()
{
	if (isset($_POST['save'])) {
		$comunicado = new Comunicado();
		$comunicado->CONVOCATORIA 		= $_POST['CONVOCATORIA'];
		$comunicado->TIPOCOMUNICADO 	= $_POST['TIPOCOMUNICADO'];
		$comunicado->DESCRIPCION 		= $_POST['DESCRIPCION'];
		$comunicado->FECHAPUBLICACION 	= date('Y-m-d H:i');

		if ($_FILES['UBICACIONCOMUNICADO']['error'] === UPLOAD_ERR_OK) {
			$nombreArchivo = $_FILES['UBICACIONCOMUNICADO']['name'];
			$ubicacionTemporal = $_FILES['UBICACIONCOMUNICADO']['tmp_name'];
			$ubicacionDestino = 'documentos/' . $nombreArchivo;

			if (move_uploaded_file($ubicacionTemporal, $ubicacionDestino)) {
				$comunicado->UBICACIONCOMUNICADO = $ubicacionDestino;
			} else {
				message("Hubo un error al mover el archivo.", "error");
				redirect("index.php");
				return;
			}
		}
		$comunicado->create();

		message("Nuevo comunicado creado exitosamente!", "success");
		redirect("index.php");
	}
}

// Función para actualizar un comunicado por medio del ID
function doEdit()
{
	if (isset($_POST['save'])) {
		$comunicado = new Comunicado();
		$comunicado->CONVOCATORIA		= $_POST['CONVOCATORIA'];
		$comunicado->TIPOCOMUNICADO		= $_POST['TIPOCOMUNICADO'];
		$comunicado->DESCRIPCION		= $_POST['DESCRIPCION'];
		if ($_FILES['UBICACIONCOMUNICADO']['error'] === UPLOAD_ERR_OK) {
			$nombreArchivo = $_FILES['UBICACIONCOMUNICADO']['name'];
			$ubicacionTemporal = $_FILES['UBICACIONCOMUNICADO']['tmp_name']; // Corrección: 'tmp_name'
			$ubicacionDestino = 'documentos/' . $nombreArchivo;

			if (move_uploaded_file($ubicacionTemporal, $ubicacionDestino)) {
				$comunicado->UBICACIONCOMUNICADO = $ubicacionDestino;
			} else {
				message("Hubo un error al mover el archivo.", "error");
				redirect("index.php");
				return;
			}
		}
		$comunicado->update($_POST['IDCOMUNICADO']);

		message("El comunicado fue actualizado!", "success");
		redirect("index.php");
	}
}

// Función para eliminar un comunicado por medio del ID
function doDelete()
{
	$id = $_GET['id'];

	global $mydb;
	$sql = "SELECT UBICACIONCOMUNICADO FROM tblComunicado where IDCOMUNICADO = $id";
	$mydb->setQuery($sql);
	$ubicacion = $mydb->loadSingleResult();

	$comunicado = new Comunicado();
	$comunicado->delete($id);
	unlink($ubicacion->UBICACIONCOMUNICADO);

	message("El comunicado fue eliminado!", "info");
	redirect('index.php');
}
