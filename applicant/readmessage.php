<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;

$sql = "UPDATE `tblRegistroPostulacion` SET HVIEW=1 WHERE `IDREGISTRO`='{$id}'";
$mydb->setQuery($sql);
$mydb->executeQuery();


$sql = "SELECT * FROM `tblConvocatoria` c,`tblRegistroPostulacion` jr,  `tblVacante` j  WHERE c.`IDCONVOCATORIA`=jr.`IDCONVOCATORIA` AND jr.`IDVACANTE`=j.`IDVACANTE` AND `IDREGISTRO`='{$id}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

$sql = "SELECT * FROM `tblRetroalimentacion` WHERE `IDREGISTRO`='{$id}'";
$mydb->setQuery($sql);
$retro = $mydb->loadSingleResult();

$applicant = new Postulantes();
$appl  = $applicant->single_Postulante($_SESSION['IDPOSTULANTE']);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- /.col -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Leer Mensaje</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="mailbox-read-info">
              <h3><?php echo $res->SERVICIO; ?></h3>
              <h5>De: <?php echo $res->CONVOCATORIA; ?>
                <span class="mailbox-read-time pull-right"><?php echo date_format(date_create($res->FECHAAPROBACION), 'd M. Y h:i a'); ?></span>
              </h5>
            </div>
            <div class="mailbox-controls with-border text-center">
              <div class="btn-group">
              </div>
            </div>
            <div class="mailbox-read-message">
              <h3>MENSAJE</h3>
              <p>Hola <?php echo $appl->NOMBRES; ?>,</p>
              <p><strong>Estado de Postulación: <?php echo $res->OBSERVACIONES; ?></strong></p>
              <p><?php echo $retro->MENSAJE; ?></p>
            </div>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>