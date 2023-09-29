<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';


switch ($action) {
	case 'approve':
		doApproved();
		break;
	case 'delete':
		doDelete();
		break;
	case 'puntaje':
		doSavePoint();
		break;
	case 'edit':
		doEdit();
		break;
}

function doApproved()
{
	global $mydb;
	if (isset($_POST['submit'])) {
		# code...
		$id = $_POST['IDREGISTRO'];
		$IDPOSTULANTE = $_POST['IDPOSTULANTE'];
		$remarks = $_POST['OBSERVACIONES'];
		$sql = "UPDATE `tblRegistroPostulacion` SET `OBSERVACIONES`='{$remarks}',SOLICITUDPENDIENTE=0,HVISTA=0,FECHAAPROBACION=NOW() WHERE `IDREGISTRO`='{$id}'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery();
		$message = $_POST['MENSAJE'];
		if ($cur) {
			# code...
			$sql = "SELECT * FROM `tblRetroalimentacion` WHERE `IDREGISTRO`='{$id}'";
			$mydb->setQuery($sql);
			$res = $mydb->loadSingleResult();
			if (isset($res)) {
				# code...
				$sql = "UPDATE `tblRetroalimentacion` SET `RETROALIMENTACION` = '{$remarks}', `MENSAJE` = '{$message}' WHERE `IDREGISTRO` = '{$id}';";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
			} else {
				$sql = "INSERT INTO `tblRetroalimentacion` (`IDPOSTULANTE`, `IDREGISTRO`,`RETROALIMENTACION`, `MENSAJE`) VALUES ('{$IDPOSTULANTE}','{$id}','{$remarks}', '$message')";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
			}
			message("La solicitante está llamando para una entrevista.", "success");
			redirect("index.php?view=view&id=" . $id);
		} else {
			message("No se pudo Guardar.", "error");
			redirect("index.php?view=view&id=" . $id);
		}
	}
}

function doDelete()
{
	$id = 	$_GET['id'];
	$emp = new RegistroPostulacion();
	$emp->delete($id);
	message("El postulante fue eliminado!", "success");
	redirect('index.php');
}

function doSavePoint()
{
	global $mydb;
	$id = 	$_GET['id'];
	$resultado = $_GET["RESULTADOENTREVISTA"];
	$puntaje = $_GET["PUNTAJEENTREVISTA"];

	$sql = "UPDATE `tblregistropostulacion` SET `RESULTADOENTREVISTA` = '{$resultado}', `PUNTAJEENTREVISTA` = '{$puntaje}' WHERE `IDREGISTRO` = '{$id}';";
	$mydb->setQuery($sql);
	$cur = $mydb->executeQuery();

	message("El puntaje del postulante se agregó correctamente!", "success");
	redirect('index.php');
}
