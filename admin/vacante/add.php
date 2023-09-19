<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}
?>

<form class="form-horizontal span6" action="controller.php?action=add" method="POST">

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Agregar Vacante</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for=IDCONVOCATORIA">Convocatoria:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "Select * From tblConvocatoria";
          $mydb->setQuery($sql);
          $res  = $mydb->loadResultList();
          foreach ($res as $row) {
            # code...
            echo '<option value=' . $row->IDCONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
          }
          ?>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="IDSERVICIO">Servicio:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="IDSERVICIO" name="IDSERVICIO" onchange="updateRemuneracion()">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "SELECT * FROM tblServicio";
          $mydb->setQuery($sql);
          $res = $mydb->loadResultList();
          foreach ($res as $row) {
            echo '<option value="' . $row->IDSERVICIO . '" data-categoria="' . $row->CATEGORIA . '" data-remuneracion="' . $row->REMUNERACIONCATEGORIA . '">' . $row->SERVICIO . '</option>';
          }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CATEGORIA">Categoría:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="CATEGORIA" name="CATEGORIA" placeholder="Categoría" autocomplete="none" readonly />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="REMUNERACION">Remuneración:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="REMUNERACION" name="REMUNERACION" placeholder="Remuneración" autocomplete="none" readonly />
      </div>
    </div>
  </div>
  <script>
    function updateRemuneracion() {
      var servicioSelect = document.getElementById("IDSERVICIO");
      var categoriaInput = document.getElementById("CATEGORIA");
      var remuneracionInput = document.getElementById("REMUNERACION");

      var selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
      var selectedValueCategoria = selectedOption.getAttribute("data-categoria");
      var selectedValueRemuneracion = selectedOption.getAttribute("data-remuneracion");

      categoriaInput.value = selectedValueCategoria;
      remuneracionInput.value = selectedValueRemuneracion;
    }
  </script>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="FORMACIONACADEMICA">Formación Académica:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="FORMACIONACADEMICA" name="FORMACIONACADEMICA" placeholder="Profesión / Ocupación" autocomplete="none" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="NROVACANTES">N° Vacantes:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="NROVACANTES" name="NROVACANTES">
          <option value="None">Seleccionar</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DURACION">Duración del Servicio:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="DURACION" name="DURACION">
          <option value="None">Seleccionar</option>
          <option value="01 MESES">01 MESES</option>
          <option value="02 MESES">02 MESES</option>
          <option value="03 MESES">03 MESES</option>
          <option value="04 MESES">04 MESES</option>
          <option value="05 MESES">05 MESES</option>
          <option value="06 MESES">06 MESES</option>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="EXPERIENCIAGENERAL">Experiencia General:</label>
      <div class="col-md-8">
        <input type="number" value="" class="form-control input-sm" id="EXPERIENCIAGENERAL" name="EXPERIENCIAGENERAL" placeholder="Experiencia General (MESES)" min="1" max="100" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="EXPERIENCIAESPECIFICA">Experiencia Específica:</label>
      <div class="col-md-8">
        <input type="number" value="" class="form-control input-sm" id="EXPERIENCIAESPECIFICA" name="EXPERIENCIAESPECIFICA" placeholder="Experiencia Específica (MESES)" min="1" max="100" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="FUNCIONES">Funciones:</label>
      <div class="col-md-8">
        <textarea style="height: 100px;" class="form-control input-sm" id="FUNCIONES" name="FUNCIONES" placeholder="Funciones" autocomplete="none"></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="LUGARTRABAJO">Lugar de Trabajo:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="LUGARTRABAJO" name="LUGARTRABAJO" placeholder="Lugar de Trabajo" autocomplete="none" />
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
</form>