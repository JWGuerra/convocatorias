
<?php
require_once './dompdf/autoload.inc.php';
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
	
	case 'createpdf' :
	doCreate();
	break;
}


function doCreate() {

}
?>