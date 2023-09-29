<?php
$idConvocatoria = $_POST['IDCONVOCATORIA'];
ob_start();
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la página</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-size: 10px; font-family: 'Arial Narrow', Arial, sans-serif;">
    <header>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/convocatorias/admin/informes/IMG/encabezado.jpg" alt="" width="100%">
    </header>
    <div class="container">
        <h5 style="text-align: center;">RESULTADOS DE ENTREVISTAS DEL PROCESO DE SELECCIÓN <?php
                                                                                            defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
                                                                                            defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'convocatorias');
                                                                                            defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'include');
                                                                                            require_once(LIB_PATH . DS . "database.php");
                                                                                            $mydb = new Database();

                                                                                            $mydb->setQuery("SELECT * FROM tblConvocatoria WHERE IDCONVOCATORIA = $idConvocatoria;");
                                                                                            $cur = $mydb->loadResultList();
                                                                                            echo $cur[0]->CONVOCATORIA;
                                                                                            ?>
            PLAN MERISS</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PROYECTO</th>
                    <th>CÓDIGO</th>
                    <th>SERVICIO</th>
                    <th>POSTULANTE</th>
                    <th>PUNTAJE</th>
                    <th>RESULTADO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once(LIB_PATH . DS . "database.php");
                $mydb = new Database();

                $mydb->setQuery("SELECT v.LUGARTRABAJO, rp.IDREGISTRO, V.SERVICIO, rp.POSTULANTE, rp.PUNTAJEENTREVISTA, rp.RESULTADOENTREVISTA FROM tblregistropostulacion rp INNER JOIN tblretroalimentacion r ON rp.IDREGISTRO = r.IDREGISTRO INNER JOIN tblvacante v ON rp.IDVACANTE = v.IDVACANTE WHERE rp.IDCONVOCATORIA = $idConvocatoria AND rp.OBSERVACIONES = 'APTO';");
                $cur = $mydb->loadResultList();

                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td>' . $result->LUGARTRABAJO . '</td>';
                    echo '<td>' . $result->IDREGISTRO . '</a></td>';
                    echo '<td>' . $result->SERVICIO . '</a></td>';
                    echo '<td>' . $result->POSTULANTE . '</td>';
                    echo '<td>' . $result->PUNTAJEENTREVISTA . '</td>';
                    echo '<td>' . $result->RESULTADOENTREVISTA . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer>
        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/convocatorias/admin/informes/IMG/piePagina.jpg" alt="" width="100%">
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>



<?php

$html = ob_get_clean();
//echo $html;

use Dompdf\Dompdf;

require_once './dompdf/autoload.inc.php';

// Crear una instancia de Dompdf
$dompdf = new Dompdf();

// Opciones de Dompdf
$options = $dompdf->getOptions();

// Configurar los márgenes a cero
$options->set([
    'isRemoteEnabled' => true,
    'isHtml5ParserEnabled' => true,
    'isPhpEnabled' => true,
    'isFontSubsettingEnabled' => false, // Puedes ajustar esto según tus necesidades
    'defaultFont' => 'Arial', // Opcional, establece la fuente predeterminada
    'dpi' => 96, // Opcional, establece la resolución DPI
    'fontHeightRatio' => 1.0 // Opcional, ajusta la relación de altura de fuente
]);

// Establecer el tamaño del papel en A4
$dompdf->setPaper('A4');

$dompdf->setOptions($options);

// Cargar el HTML
$dompdf->loadHtml($html);

// Renderizar el PDF
$dompdf->render();

// Transmitir el PDF al navegador sin descargarlo
$dompdf->stream("Resultados_Entrevista.pdf", ['Attachment' => false]);

?>