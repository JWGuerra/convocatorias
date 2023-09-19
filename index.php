<?php
require_once("include/initialize.php");
$content = 'home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) {
	case 'apply':
		$title = "Solicitud de Postulación";
		$content = 'applicationform.php';
		break;
	case 'login':
		$title = "Iniciar Sesión";
		$content = 'login.php';
		break;
	case 'convocatoria':
		$title = "Convocatorias";
		$content = 'convocatoria.php';
		break;
	case 'comunicado':
		$title = "Comunicados";
		$content = 'comunicado.php';
		break;
	case 'hiring':
		$title = isset($_GET['search']) ? 'Vacantes en ' . $_GET['search'] : "Vacantes Publicadas";
		$content = 'hirring.php';
		break;
	case 'listaComunicados':
		$title = isset($_GET['search']) ? 'Comunicados de la ' . $_GET['search'] : "Comunicados Publicados";
		$content = 'listaComunicados.php';
		break;
	case 'servicio':
		$title = 'Buscar por ' . $_GET['search'];
		$content = 'servicio.php';
		break;
	case 'viewVacante':
		$title = "Detalles de la Vacante";
		$content = 'viewVacante.php';
		break;
	case 'viewComunicado':
		$title = "Detalles del Comunicado";
		$content = 'viewComunicado.php';
		break;
	case 'success':
		$title = "Exitosamente";
		$content = 'success.php';
		break;
	case 'register':
		$title = "Registrar nuevo miembro";
		$content = 'register.php';
		break;
	case 'About':
		$title = 'Acerca de Plan MERISS';
		$content = 'About.php';
		break;
	case 'advancesearch':
		$title = 'Búsqueda Avanzada';
		$content = 'advancesearch.php';
		break;
	case 'result':
		$title = 'Búsqueda Avanzada';
		$content = 'advancesearchresult.php';
		break;
	case 'search-convocatoria':
		$title = 'Buscar por Convocatoria';
		$content = 'searchbyConvocatoria.php';
		break;
	case 'search-Servicio':
		$title = 'Buscar por Servicio';
		$content = 'searchbyServicio.php';
		break;
	default:
		$active_home = 'active';
		$title = "Home";
		$content = 'home.php';
}
require_once("theme/templates.php");