<?php
require_once("include/initialize.php");
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'submitapplication':
		doapplicationform();
		break;

	case 'register':
		doRegister();
		break;

	case 'login':
		doLogin();
		break;
	case 'puestoLaboral':
		doPuestoLaboral();
		break;
}

function doapplicationform()
{
	global $mydb;
	$IDVACANTE  	= 	$_GET['IDVACANTE'];
	$autonum 		= 	new Autonumber();
	$IDPOSTULANTE 	= 	$autonum->set_autonumber('POSTULANTE');
	$autonum 		= 	new Autonumber();
	$IDARCHIVO 		= 	$autonum->set_autonumber('IDARCHIVO');
	@$picture 		= 	UploadImage();
	@$location 		= 	"photos/" . $picture;

	if ($picture == "") {
		redirect(web_root . "index.php?q=apply&job=" . $IDVACANTE . "&view=personalinfo");
	} else {
		if (isset($_SESSION['IDPOSTULANTE'])) {
			$sql = "INSERT INTO `tblArchivoAdjunto` (`IDARCHIVO`, 					  `IDVACANTE`,   `NOMBREARCHIVO`,	`UBICACIONARCHIVO`, `IDUSARIOARCHIVO`) 
											VALUES  ('$IDARCHIVO->AUTO','{$IDVACANTE}','Curriculum Vitae','{$location}',		'{$_SESSION['IDPOSTULANTE']}')";
			$mydb->setQuery($sql);
			$res = $mydb->executeQuery();
			doUpdate($IDVACANTE, $IDARCHIVO->AUTO);
		} else {
			$sql = "INSERT INTO `tblArchivoAdjunto` (`IDARCHIVO`, 					  `IDVACANTE`,   `NOMBREARCHIVO`,	`UBICACIONARCHIVO`, `IDUSARIOARCHIVO`) 
											 VALUES ('$IDARCHIVO->AUTO','{$IDVACANTE}','Curriculum Vitae','{$location}','" . date('Y') . $IDPOSTULANTE->AUTO . "')";
			$mydb->setQuery($sql);
			$res = $mydb->executeQuery();
			doInsert($IDVACANTE, $IDARCHIVO->AUTO);
			$autonum = new Autonumber();
			$autonum->auto_update('POSTULANTE');
		}
	}
	$autonum = new Autonumber();
	$autonum->auto_update('IDARCHIVO');
}

function doInsert($IDVACANTE = 0, $IDARCHIVO = 0)
{
	if (isset($_POST['submit'])) {
		global $mydb;
		$autonum = new Autonumber();
		$auto = $autonum->set_autonumber('POSTULANTE');

		$POSTULANTE = new Postulantes();
		$POSTULANTE->IDPOSTULANTE 	= date('Y') . $auto->AUTO;
		$POSTULANTE->DNI 			= $_POST['DNI'];
		$POSTULANTE->APELLIDOS 		= $_POST['APELLIDOS'];
		$POSTULANTE->NOMBRES 		= $_POST['NOMBRES'];
		$POSTULANTE->DIRECCION 		= $_POST['DIRECCION'];
		$POSTULANTE->NOMBREUSUARIO 	= $_POST['NOMBREUSUARIO'];
		$POSTULANTE->CONTRASENA 	= sha1($_POST['CONTRASENA']);
		$POSTULANTE->CORREO 		= $_POST['CORREO'];
		$POSTULANTE->CELULAR 		= $_POST['CELULAR'];
		$POSTULANTE->FORMACIONACADEMICA	= $_POST['FORMACIONACADEMICA'];
		$POSTULANTE->create();

		$sql = "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND IDVACANTE = '{$IDVACANTE}'";
		$mydb->setQuery($sql);
		$result = $mydb->loadSingleResult();
		$jobreg = new RegistroVacante();
		$jobreg->IDCONVOCATORIA 	= $result->IDCONVOCATORIA;
		$jobreg->IDVACANTE     		= $result->IDVACANTE;
		$jobreg->IDPOSTULANTE 		= date('Y') . $auto->AUTO;
		$jobreg->POSTULANTE   		= $_POST['APELLIDOS'] . ' ' . $_POST['NOMBRES'];
		$jobreg->FECHAREGISTRO 		= date('Y-m-d');
		$jobreg->IDARCHIVO 			= date('Y') . $IDARCHIVO;
		$jobreg->OBSERVACIONES 		= 'PENDIENTE';
		$jobreg->FECHAAPROBACION 	= date('Y-m-d H:i');
		$jobreg->create();

		message("Tu postulación fue enviada correctamente. Espere que la institución se comunique si usted esta calificado para esta vacante.", "success");
		redirect("index.php?q=success&job=" . $result->IDVACANTE);
	}
}

function doUpdate($IDVACANTE = 0, $IDARCHIVO = 0)
{
	if (isset($_POST['submit'])) {
		global $mydb;

		$POSTULANTE = new Postulantes();
		$appl  		= $POSTULANTE->single_POSTULANTE($_SESSION['IDPOSTULANTE']);
		$sql 		= "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND IDVACANTE = '{$IDVACANTE}'";
		$mydb->setQuery($sql);
		$result 	= $mydb->loadSingleResult();
		$jobreg 	= new RegistroVacante();
		$jobreg->IDCONVOCATORIA		= 	$result->IDCONVOCATORIA;
		$jobreg->IDVACANTE     		= 	$result->IDVACANTE;
		$jobreg->IDPOSTULANTE 		= 	$appl->IDPOSTULANTE;
		$jobreg->POSTULANTE   		= 	$appl->APELLIDOS . ' ' . $appl->NOMBRES;
		$jobreg->FECHAREGISTRO 		= 	date('Y-m-d');
		$jobreg->IDARCHIVO 			= 	date('Y') . $IDARCHIVO;
		$jobreg->OBSERVACIONES 		= 	'PENDIENTE';
		$jobreg->FECHAAPROBACION 	= 	date('Y-m-d H:i');
		$jobreg->create();
		message("Su postulación fue enviada. Por favor espere que la institución se comunique con usted si esta calificado para la vacante. Inicie sesión en la parte superior derecha con el usuario y clave registrado, para realizar el seguimiento.", "success");
		redirect("index.php?q=success&job=" . $result->IDVACANTE);
	}
}
function doRegister()
{
	global $mydb;
	$autonum 	= new Autonumber();
	$auto 		= $autonum->set_autonumber('POSTULANTE');
	$POSTULANTE = new Postulantes();
	$POSTULANTE->IDPOSTULANTE 		= date('Y') . $auto->AUTO;
	$POSTULANTE->DNI 				= $_POST['DNI'];
	$POSTULANTE->APELLIDOS 			= $_POST['APELLIDOS'];
	$POSTULANTE->NOMBRES 			= $_POST['NOMBRES'];
	$POSTULANTE->DIRECCION 			= $_POST['DIRECCION'];
	$POSTULANTE->NOMBREUSUARIO 		= $_POST['NOMBREUSUARIO'];
	$POSTULANTE->CONTRASENA 		= sha1($_POST['CONTRASENA']);
	$POSTULANTE->CORREO 			= $_POST['CORREO'];
	$POSTULANTE->CELULAR 			= $_POST['CELULAR'];
	$POSTULANTE->FORMACIONACADEMICA = $_POST['FORMACIONACADEMICA'];
	$POSTULANTE->create();
	$autonum = new Autonumber();
	$autonum->auto_update('POSTULANTE');
	message("Usted se registro correctamente. Puedes iniciar sesión ahora!", "success");
	redirect("index.php?q=success");
}

function doLogin()
{
	$email 		= trim($_POST['NOMBREUSUARIO']);
	$upass  	= trim($_POST['CONTRASENA']);
	$h_upass 	= sha1($upass);

	//it creates a new objects of member
	$POSTULANTE = new Postulantes();
	//make use of the static function, and we passed to parameters
	$res = $POSTULANTE->postulante_Authentication($email, $h_upass);
	if ($res == true) {
		message("Iniciaste Sesión con Éxito!", "success");
		redirect(web_root . "applicant/");
	} else {
		echo "La cuenta no existe! Comuniquese con el Administrador.";
	}
}

function UploadImage($IDVACANTE = 0)
{
	$target_dir = "applicant/photos/";
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
			message("Error Uploading File", "error");
		}
	} else {
		message("File Not Supported", "error");
	}
}

function doPuestoLaboral()
{
	if (isset($_POST['save'])) {
		$puestoLaboral = new puestoLaboral();
		$puestoLaboral->DNI 				= $_POST['DNI'];
		$puestoLaboral->APELLIDOS 			= $_POST['APELLIDOS'];
		$puestoLaboral->NOMBRES 			= $_POST['NOMBRES'];
		$puestoLaboral->DIRECCION 			= $_POST['DIRECCION'];
		$puestoLaboral->CORREO 				= $_POST['CORREO'];
		$puestoLaboral->CELULAR 			= $_POST['CELULAR'];
		$puestoLaboral->FORMACIONACADEMICA 	= $_POST['FORMACIONACADEMICA'];
		$puestoLaboral->PROFESION_OFICIO 	= $_POST['PROFESION_OFICIO'];
		$puestoLaboral->EXPERIENCIAPUBLICA 	= $_POST['EXPERIENCIAPUBLICA'];
		$puestoLaboral->EXPERIENCIAPRIVADA 	= $_POST['EXPERIENCIAPRIVADA'];
		$puestoLaboral->FECHASOLICITUD 		= date('Y-m-d H:i');

		if ($_FILES['UBICACIONCV']['error'] === UPLOAD_ERR_OK) {
			$nombreArchivo = $_FILES['UBICACIONCV']['name'];
			$ubicacionTemporal = $_FILES['UBICACIONCV']['tmp_name'];
			$ubicacionDestino = 'admin/solicitud_trabajo/documentos/' . $nombreArchivo;

			if (move_uploaded_file($ubicacionTemporal, $ubicacionDestino)) {
				$puestoLaboral->UBICACIONCV = $ubicacionDestino;
			} else {
				message("Hubo un error al guardar el archivo.", "error");
				redirect("index.php?error");
				return;
			}
		}
		$puestoLaboral->create();
		message("Tu solicitud de puesto laboral fue enviada correctamente. Espere que la institución se comunique si usted esta calificado para una vacante.", "success");
		redirect("index.php?q=success");
	}
}
