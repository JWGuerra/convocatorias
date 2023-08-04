
<?php
require_once ("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;
}


function cleanContent($content) {
	// Implementa aquí tu lógica de limpieza y validación del contenido
	$content = trim(preg_replace('[\n|\n\r]', '<br>', $content));
	$content = trim(preg_replace('[\r]', '', $content));
	return $content;
}

function doInsert(){
	global $mydb;
	if(isset($_POST['save'])){
		if ( $_POST['COMPANYID'] == "None") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$sql = "SELECT * FROM tblcategory where CATEGORYID = {$_POST['CATEGORY']}";
			$mydb->setQuery($sql);
			$cat = $mydb->loadSingleResult();
			$_POST['CATEGORY']=$cat->CATEGORY;
			$job = New Jobs();
			$job->COMPANYID							= $_POST['COMPANYID']; 
			$job->CATEGORY							= $_POST['CATEGORY']; 
			$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
			$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
			$job->SALARIES							= $_POST['SALARIES'];
			$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
			$job->QUALIFICATION_WORKEXPERIENCE		= cleanContent($_POST['QUALIFICATION_WORKEXPERIENCE']);
			$job->JOBDESCRIPTION					= cleanContent($_POST['JOBDESCRIPTION']);
			$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
			$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
			$job->DATEPOSTED						= date('Y-m-d H:i');
			$job->create();

			message("Nueva Vacante creada exitosamente!", "success");
			redirect("index.php");
		}
	}
}

function doEdit(){
	global $mydb;
	if(isset($_POST['save'])){
		if ( $_POST['COMPANYID'] == "None") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$sql = "SELECT * FROM tblcategory where CATEGORYID = {$_POST['CATEGORY']}";
			$mydb->setQuery($sql);
			$cat = $mydb->loadSingleResult();
			$_POST['CATEGORY']=$cat->CATEGORY;
			$job = New Jobs();
				$job->COMPANYID						= $_POST['COMPANYID']; 
			$job->CATEGORY							= $_POST['CATEGORY']; 
			$job->OCCUPATIONTITLE					= $_POST['OCCUPATIONTITLE'];
			$job->REQ_NO_EMPLOYEES					= $_POST['REQ_NO_EMPLOYEES'];
			$job->SALARIES							= $_POST['SALARIES'];
			$job->DURATION_EMPLOYEMENT				= $_POST['DURATION_EMPLOYEMENT'];
			$job->QUALIFICATION_WORKEXPERIENCE		= $_POST['QUALIFICATION_WORKEXPERIENCE'];
			$job->JOBDESCRIPTION					= $_POST['JOBDESCRIPTION'];
			$job->PREFEREDSEX						= $_POST['PREFEREDSEX'];
			$job->SECTOR_VACANCY					= $_POST['SECTOR_VACANCY']; 
			$job->update($_POST['JOBID']);

			message("La vacante de trabajo se actualizó!", "success");
			redirect("index.php");
		}
	}
}

function doDelete(){
	$id = $_GET['id'];
	$job = New Jobs();
	$job->delete($id);
	message("La vacante fue eliminada!","info");
	redirect('index.php');		
}
?>