<?php
require_once("../include/initialize.php");
if (!isset($_SESSION['IDPOSTULANTE'])) {
	redirect(web_root . "index.php");
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

	case 'photos':
		doupdateimage();
		break;
}

function doEdit()
{
	$applicant = new Postulantes();
	$applicant->DNI 				= $_POST['DNI'];
	$applicant->APELLIDOS 			= $_POST['APELLIDOS'];
	$applicant->NOMBRES 			= $_POST['NOMBRES'];
	$applicant->DIRECCION 			= $_POST['DIRECCION'];
	$applicant->CORREO 				= $_POST['CORREO'];
	$applicant->CELULAR 			= $_POST['CELULAR'];
	$applicant->FORMACIONACADEMICA 	= $_POST['FORMACIONACADEMICA'];
	$applicant->update($_SESSION['IDPOSTULANTE']);

	message("La cuenta fue actualizada!", "success");
	redirect("index.php?view=accounts");
}

function doupdateimage()
{
	$errofile = $_FILES['photo']['error'];
	$type = $_FILES['photo']['type'];
	$temp = $_FILES['photo']['tmp_name'];
	$myfile = $_FILES['photo']['name'];
	$location = "photos/" . $myfile;


	if ($errofile > 0) {
		message("No Image Selected!", "error");
		redirect("index.php?view=view&id=" . $_GET['id']);
	} else {

		@$file = $_FILES['photo']['tmp_name'];
		@$image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		@$image_name = addslashes($_FILES['photo']['name']);
		@$image_size = getimagesize($_FILES['photo']['tmp_name']);

		if ($image_size == FALSE) {
			message("Uploaded file is not an image!", "error");
			redirect("index.php?view=view&id=" . $_GET['id']);
		} else {
			//uploading the file
			move_uploaded_file($temp, "photos/" . $myfile);



			$applicant = new Postulantes();
			$applicant->FOTO 			= $location;
			$applicant->update($_SESSION['IDPOSTULANTE']);
			redirect(web_root . "applicant/");
		}
	}
}



function doAddFiles()
{
	global $mydb;
	// `IDVACANTE`, `NOMBREARCHIVO`, `UBICACIONARCHIVO`, `IDUSARIOARCHIVO`
	$picture = UploadImage();
	$location = "photos/" . $picture;

	$sql = "INSERT INTO `tblArchivoAdjunto` (`IDVACANTE`, `NOMBREARCHIVO`, `UBICACIONARCHIVO`, `IDUSARIOARCHIVO`) 
		VALUES ('" . $_SESSION['IDPOSTULANTE'] . "','','Resume','{$location}','" . $_SESSION['IDPOSTULANTE'] . "')";
	$mydb->setQuery($sql);
	$res = $mydb->executeQuery();

	message("File has been uploaded!", "success");
	redirect("index.php?tab=files");
}

function UploadImage()
{
	$target_dir = "photos/";
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
