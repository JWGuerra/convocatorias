<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data">

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"> Agregar Comunicado</h1>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=CONVOCATORIA">Convocatoria:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "Select * From tblConvocatoria";
          $mydb->setQuery($sql);
          $res  = $mydb->loadResultList();
          foreach ($res as $row) {
            # code...
            echo '<option value=' . $row->CONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
          }
          ?>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="TIPOCOMUNICADO">Tipo:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="TIPOCOMUNICADO" name="TIPOCOMUNICADO">
          <option value="None">Seleccionar</option>
          <option value="otros">Bases / Ficha Resumen / Fe Erratas</option>
          <option value="cronogramas">Cronogramas</option>
          <option value="resultados">Resultados</option>
          <option value="comunicados">Comunicados</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DESCRIPCION">Descripción:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="DESCRIPCION" name="DESCRIPCION" placeholder="Descripción" autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="UBICACION">Subir Documento:</label>
      <div class="col-md-8">
      <input type="file" name="UBICACIONCOMUNICADO" required>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>
      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> GUARDAR</button>
        <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="rows">
      <div class="col-md-6">
        <label class="col-md-6 control-label" for="otherperson"></label>
        <div class="col-md-6">
        </div>
      </div>
      <div class="col-md-6" align="right">
      </div>
    </div>
  </div>
</form>