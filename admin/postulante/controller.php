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
	case 'add':
		doInsert();
		break;

	case 'edit':
		doEdit();
		break;

	case 'delete':
		doDelete();
		break;

	case 'photos':
		doupdateimage();
		break;


	case 'addfiles':
		doAddFiles();
		break;
}

function doDelete()
{
	$id = 	$_GET['id'];
	$emp = new RegistroPostulacion();
	$emp->delete($id);
	message("El postulante fue eliminado!", "success");
	redirect('index.php');
}



function UploadImage()
{
	$target_dir = "../../employee/photos/";
	$target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


	if (
		$imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
		|| $imageFileType != "gif"
	) {
		if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
			return  date("dmYhis") . basename($_FILES["picture"]["name"]);
		} else {
			echo "Error Uploading File";
			exit;
		}
	} else {
		echo "File Not Supported";
		exit;
	}
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
				message("PRIMER IF.", "success");
			} else {
				$sql = "INSERT INTO `tblRetroalimentacion` (`IDPOSTULANTE`, `IDREGISTRO`,`RETROALIMENTACION`, `MENSAJE`) VALUES ('{$IDPOSTULANTE}','{$id}','{$remarks}', '$message')";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				message("SEGUNDO IF.", "success");
			}
			message("El/La postulante está llamando para una entrevista.", "success");
			redirect("index.php?view=view&id=" . $id);
		} else {
			message("No se pudo Guardar.", "error");
			redirect("index.php?view=view&id=" . $id);
		}
	}
}
