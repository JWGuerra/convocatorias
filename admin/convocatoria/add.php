<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Agregar Convocatoria</h1>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CONVOCATORIA">Nombre de Convocatoria:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA" placeholder="Nombre de Convocatoria" type="text" value="Convocatoria" autocomplete="none" readonly>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="ANIO">Año:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="ANIO" name="ANIO">
          <option value="None">Seleccionar</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
          <option value="2027">2027</option>
          <option value="2028">2028</option>
          <option value="2029">2029</option>
          <option value="2030">2030</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="NROCONVOCATORIA">N° Convocatoria:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="NROCONVOCATORIA" name="NROCONVOCATORIA">
          <option value="None">Seleccionar</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
        </select>
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