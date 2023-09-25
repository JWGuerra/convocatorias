<?php
$idConvocatoria = $_POST['IDCONVOCATORIA'];
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Plantilla Bootstrap con Encabezado y Pie de Página</title>
    <!-- Incluye los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin: auto;
            padding: 5px;
            font-size: 10px;
            font-family: "Arial Narrow", Arial, sans-serif;
        }

        .header,
        .footer {
            text-align: center;
            background-color: white;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header">
                    <!-- Contenido del encabezado -->
                    <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/convocatorias/admin/informes/IMG/encabezado.jpg" alt="" width="100%">
                </div>
            </div>
        </div>
        <h4 style="text-align: center;">RESULTADOS DE EVALUACIÓN CURRICULAR DEL PROCESO DE SELECCIÓN <?php
                                                                defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
                                                                defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . DS . 'convocatorias');
                                                                defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'include');
                                                                require_once(LIB_PATH . DS . "database.php");
                                                                $mydb = new Database();

                                                                $mydb->setQuery("SELECT * FROM tblConvocatoria WHERE IDCONVOCATORIA = $idConvocatoria;");
                                                                $cur = $mydb->loadResultList();
                                                                echo $cur[0]->CONVOCATORIA;
                                                                ?>
                                                                PLAN MERISS</h4>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>PROYECTO</th>
                            <th>CÓDIGO</th>
                            <th>SERVICIO</th>
                            <th>POSTULANTE</th>
                            <th>OBSERVACIONES</th>
                            <th>APTO/NO APTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once(LIB_PATH . DS . "database.php");
                        $mydb = new Database();

                        $mydb->setQuery("SELECT v.LUGARTRABAJO, rp.IDREGISTRO, V.SERVICIO, rp.POSTULANTE, r.MENSAJE, rp.OBSERVACIONES FROM tblregistropostulacion rp INNER JOIN tblretroalimentacion r ON rp.IDREGISTRO = r.IDREGISTRO INNER JOIN tblvacante v ON rp.IDVACANTE = v.IDVACANTE WHERE rp.IDCONVOCATORIA = $idConvocatoria;");
                        $cur = $mydb->loadResultList();

                        foreach ($cur as $result) {
                            echo '<tr>';
                            // echo '<td width="5%" align="center"></td>';
                            echo '<td>' . $result->LUGARTRABAJO . '</td>';
                            echo '<td>' . $result->IDREGISTRO . '</a></td>';
                            echo '<td>' . $result->SERVICIO . '</a></td>';
                            echo '<td>' . $result->POSTULANTE . '</td>';
                            echo '<td>' . $result->MENSAJE . '</td>';
                            echo '<td>' . $result->OBSERVACIONES . '</td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </table>

            <div class="row">
                <div class="col-12">
                    <div class="footer">
                        <!-- Contenido del pie de página -->
                        <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/convocatorias/admin/informes/IMG/piePagina.jpg" alt="" width="100%">
                    </div>
                </div>
            </div>
        </div>

        <!-- Incluye los archivos JS de Bootstrap (jQuery y Popper.js) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    'pdfBackend' => 'CPDF', // Opcional, ajusta el backend PDF si lo deseas
    'defaultFont' => 'Arial', // Opcional, establece la fuente predeterminada
    'dpi' => 96, // Opcional, establece la resolución DPI
    'fontHeightRatio' => 1.0 // Opcional, ajusta la relación de altura de fuente
]);

// Establecer los márgenes a cero (superior, inferior, izquierdo y derecho)
$options->set('margin-top', 0.5);
$options->set('margin-bottom', 0.5);
$options->set('margin-left', 0.5);
$options->set('margin-right', 0.5);

$dompdf->setOptions($options);

// Cargar el HTML
$dompdf->loadHtml($html);

// Establecer el tamaño del papel en A4
$dompdf->setPaper('A4');

// Renderizar el PDF
$dompdf->render();

// Transmitir el PDF al navegador sin descargarlo
$dompdf->stream("archivo.pdf", ['Attachment' => false]);

?>