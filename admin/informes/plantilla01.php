<?php
use Dompdf\Dompdf;
require_once './dompdf/autoload.inc.php';
$dompdf = new Dompdf();


//Recuperamos la plantilla
$ruta_archivo = 'plantilla_postulantes.html';

// Usar file_get_contents para leer el archivo y almacenarlo en una variable
$contenido1 = file_get_contents($ruta_archivo);

// Load HTML content 
$dompdf->loadHtml($contenido1);
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape');
// Render the HTML as PDF 
$dompdf->render();
// Output the generated PDF to Browser
$f;
$l;
if (headers_sent($f, $l)) {
	echo $f, '<br/>', $l, '<br/>';
	die('now detect line');
}
$dompdf->stream('primerpdf.pdf');
?>