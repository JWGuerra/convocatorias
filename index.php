<?php
require_once("include/initialize.php");
$content = 'home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
switch ($view) {
	case 'apply':
		$title = "FORMULARIO DE POSTULACIÓN DE CONVOCATORIA";
		$content = 'applicationform.php';
		break;
	case 'solicitud_trabajo_form':
		$title = "SOLICITUD DE PUESTO LABORAL";
		$content = 'solicitud_trabajo_form.php';  // Para solicitud de postulación
		break;
	case 'login':
		$title = "INICIAR SESIÓN";
		$content = 'login.php';
		break;
	case 'convocatoria':
		$title = "CONVOCATORIAS";
		$content = 'convocatoria.php';
		break;
	case 'solicitud_trabajo':
		$title = "SOLICITUD DE PUESTO LABORAL";
		$content = 'solicitud_trabajo.php';
		break;
	case 'comunicado':
		$title = "COMUNICADOS";
		$content = 'comunicado.php';
		break;
	case 'hiring':
		$title = isset($_GET['search']) ? 'Vacantes en ' . $_GET['search'] : "VACANTES PUBLICADAS";
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
		$title = "DETALLES DE VACANTE";
		$content = 'viewVacante.php';
		break;
	case 'viewComunicado':
		$title = "DETALLES DEL COMUNICADO";
		$content = 'viewComunicado.php';
		break;
	case 'success':
		$title = "EXITOSAMENTE";
		$content = 'success.php';
		break;
	case 'register':
		$title = "REGISTRAR NUEVO MIEMBRO";
		$content = 'register.php';
		break;
	case 'About':
		$title = 'ACERCA DE PLAN MERISS';
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
		$title = "HOME";
		$content = 'home.php';
}
require_once("theme/templates.php");
