<?php
require_once("../include/initialize.php");  
if (!isset($_SESSION['IDPOSTULANTE'])) {
	redirect(web_root.'index.php');
}
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) { 
	case 'appliedjobs' :
	    $title="Vacantes Aplicadas";	
        $_SESSION['appliedjobs']='active' ; 
		$content ='Profile.php';
		break;

	case 'notification' :
	    $title="Notificaciones";	
        $_SESSION['notification']='active' ; 
		$content ='Profile.php';
		break;
  
	case 'accounts' : 
	    $title="Cuenta";	
        $_SESSION['accounts']='active' ;
        $content ='Profile.php';
		break;
	 
	default : 
	    $title="Perfil";	
        $_SESSION['appliedjobs']='active' ;
		$content ='Profile.php';		
}
require_once("../theme/templates.php");