<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

?>
<form class="form-horizontal span6" action="controller.php?action=add" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Agregar Nuevo Servicio</h1>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="SERVICIO">Servicio:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="SERVICIO" name="SERVICIO" placeholder="Servicio" type="text" value="">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CATEGORIA">Categoría:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="CATEGORIA" name="CATEGORIA" onchange="updateRemuneracion()">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "SELECT * FROM tblCategoria";
          $mydb->setQuery($sql);
          $res = $mydb->loadResultList();
          foreach ($res as $row) {
            echo '<option value="' . $row->CATEGORIA . '" title=" ' . $row->REMUNERACIONCATEGORIA . '">' . $row->CATEGORIA . '</option>';
          }
          ?>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="REMUNERACIONCATEGORIA">Remuneración:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="REMUNERACIONCATEGORIA" name="REMUNERACIONCATEGORIA" placeholder="Remuneración" type="text" value="" readonly>
      </div>
    </div>
  </div>
  <script>
    function updateRemuneracion() {
      var categoriaSelect = document.getElementById("CATEGORIA");
      var remuneracionInput = document.getElementById("REMUNERACIONCATEGORIA");
      var selectedOption = categoriaSelect.options[categoriaSelect.selectedIndex];
      var selectedValue = selectedOption.getAttribute('title');
      remuneracionInput.value = selectedValue;
    }
  </script>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>
      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit">
          <span class="fa fa-save fw-fa"></span>GUARDAR
        </button>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="rows">
      <div class="col-md-6">
        <label class="col-md-6 control-label" for="otherperson">
        </label>
        <div class="col-md-6">
        </div>
      </div>
      <div class="col-md-6" align="right">
      </div>
    </div>
  </div>
</form>