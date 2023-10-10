<?php
require_once("../../include/initialize.php");
if (!isset($_SESSION['ADMIN_USERID'])) {
	redirect(web_root . "admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'edit':
		doEdit();
		break;

	case 'delete':
		doDelete();
		break;
}

function doDelete()
{
	$id = 	$_GET['id'];
	$emp = new puestoLaboral();
	$emp->delete($id);
	message("La solicitud laboral fue eliminada!", "success");
	redirect('index.php');
}