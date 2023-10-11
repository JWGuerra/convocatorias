<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

// Recuperamos el ID de la convocatoria
$IDCONVOCATORIA = $_GET['id'];
$convocatoria = new Convocatoria();
$res = $convocatoria->single_convocatoria($IDCONVOCATORIA);

?>
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Editar Convocatoria</h1>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CONVOCATORIA">Nombre de Convocatoria:</label>
      <div class="col-md-8">
        <input type="hidden" name="IDCONVOCATORIA" value="<?php echo $res->IDCONVOCATORIA; ?>">
        <input class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA" placeholder="Nombre de Convocatoria" type="text" value="<?php echo $res->CONVOCATORIA; ?>" readonly>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="ANIO">Año:</label>
      <div class="col-md-8">
        <input type="hidden" name="ANIO" value="<?php echo $res->IDCONVOCATORIA; ?>">
        <input class="form-control input-sm" id="ANIO" name="ANIO" placeholder="Año" type="text" value="<?php echo $res->ANIO; ?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="NROCONVOCATORIA">N°:</label>
      <div class="col-md-8">
        <input type="hidden" name="NROCONVOCATORIA" value="<?php echo $res->NROCONVOCATORIA; ?>">
        <input class="form-control input-sm" id="NROCONVOCATORIA" name="NROCONVOCATORIA" placeholder="N° Convocatoria" type="text" value="<?php echo $res->NROCONVOCATORIA; ?>">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>
      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> GUARDAR</button>
      </div>
    </div>
  </div>
</form>