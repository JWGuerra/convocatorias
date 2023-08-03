<?php 
require_once("include/initialize.php"); 
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) { 
	case 'apply' :
        $title="Formulario de Postulación";	
		$content='applicationform.php';		
		break;
	case 'login' : 
        $title="Iniciar Sesión";	
		$content='login.php';		
		break;
	case 'company' :
        $title="Convocatorias";	
		$content='company.php';		
		break;
	case 'comunicados' :
		$title="Comunicados";	
		$content='comunicados.php';		
		break;
	case 'hiring' :
		$title = isset($_GET['search']) ? 'Vacantes en '.$_GET['search'] :"Vacantes Publicadas"; 
		$content='hirring.php';		
		break;		
	case 'category' :
        $title='Buscar por '. $_GET['search'];
		$content='category.php';		
		break;
	case 'viewjob' :
        $title="Detalles de la Vacante";	
		$content='viewjob.php';		
		break;
	case 'viewComunicado' :
			$title="Detalles del Comunicado";	
			$content='viewComunicado.php';		
			break;
	case 'success' :
        $title="Exitosamente";	
		$content='success.php';		
		break;
	case 'register' :
        $title="Registrar nuevo miembro";	
		$content='register.php';		
		break;
	case 'Contact' :
        $title='Contactanos';	
		$content='Contact.php';		
		break;	
	case 'About' :
        $title='Acerca de Plan MERISS';	
		$content='About.php';		
		break;	
	case 'advancesearch' :
        $title='Búsqueda Avanzada';	
		$content='advancesearch.php';		
		break;	

	case 'result' :
        $title='Búsqueda Avanzada';	
		$content='advancesearchresult.php';		
		break;
	case 'search-company' :
        $title='Buscar por Convocatoria';	
		$content='searchbycompany.php';		
		break;	
	case 'search-function' :
        $title='Buscar por Categoría';	
		$content='searchbyfunction.php';		
		break;							
	default :
	    $active_home='active';
	    $title="Home";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>