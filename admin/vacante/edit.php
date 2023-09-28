<?php

use function PHPSTORM_META\type;

if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

$IDVACANTE = $_GET['id'];
$job = new Vacante();
$res = $job->single_Vacante($IDVACANTE);

?>
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Actualizar Vacante</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="IDVACANTE">Vacante:</label>
      <div class="col-md-8">
        <input id="IDVACANTE" name="IDVACANTE" type="HIDDEN" value="<?php echo $res->IDVACANTE; ?>">
        <input class="form-control input-sm" id="IDVACANTE" name="IDVACANTE" placeholder="Vacante" type="text" value="<?php echo $res->IDVACANTE; ?>" readonly>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="IDCONVOCATORIA">Convocatoria:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "Select * From tblConvocatoria";
          $mydb->setQuery($sql);
          $result  = $mydb->loadResultList();
          foreach ($result as $row) {
            $selected = ($row->IDCONVOCATORIA == $res->IDCONVOCATORIA) ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $row->IDCONVOCATORIA . '">' . $row->CONVOCATORIA . '</option>';
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
        <select class="form-control input-sm" id="IDSERVICIO" name="IDSERVICIO">
          <option value="None">Seleccionar</option>
          <?php
          $sql = "Select * From tblServicio";
          $mydb->setQuery($sql);
          $result  = $mydb->loadResultList();
          foreach ($result as $row) {
            $selected = ($row->SERVICIO == $res->SERVICIO) ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $row->IDSERVICIO . '" data-remuneracion="' . $row->REMUNERACIONCATEGORIA . '" data-categoria="' . $row->CATEGORIA . '">' . $row->SERVICIO . '</option>';
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
        <input class="form-control input-sm" id="REMUNERACION" name="REMUNERACION" placeholder="Remuneración" type="text" value="" readonly>
      </div>
    </div>
  </div>
  <script>
    // Función para actualizar la remuneración según la categoría seleccionada
    function updateRemuneracion() {
      var servicioSelect = document.getElementById("IDSERVICIO");
      var remuneracionInput = document.getElementById("REMUNERACION");
      var categoriaInput = document.getElementById("CATEGORIA");

      var selectedOption = servicioSelect.options[servicioSelect.selectedIndex];
      var selectedRemuneracion = selectedOption.getAttribute('data-remuneracion');
      var selectedCategoria = selectedOption.getAttribute('data-categoria');

      remuneracionInput.value = selectedRemuneracion;
      categoriaInput.value = selectedCategoria;
    }

    // Se llama a la función cuando se carga la página
    window.onload = updateRemuneracion;

    // Se asocia la función a un evento de cambio en el campo de selección
    var servicioSelect = document.getElementById("IDSERVICIO");
    servicioSelect.addEventListener("change", updateRemuneracion);
  </script>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="FORMACIONACADEMICA">Formación Académica:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="FORMACIONACADEMICA" name="FORMACIONACADEMICA" placeholder="Profesión / Ocupación" autocomplete="none" value="<?php echo $res->FORMACIONACADEMICA; ?>" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="NROVACANTES">N° de Vacantes:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="NROVACANTES" name="NROVACANTES" placeholder="N° de Vacantes" autocomplete="none" value="<?php echo $res->NROVACANTES ?>" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DURACION">Duración del Contrato:</label>
      <div class="col-md-8">
        <input class="form-control input-sm" id="DURACION" name="DURACION" placeholder="Duración del Contrato" autocomplete="none" value="<?php echo $res->DURACION ?>" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="EXPERIENCIAGENERAL">Experiencia General:</label>
      <div class="col-md-8">
        <input type="number" class="form-control input-sm" id="EXPERIENCIAGENERAL" name="EXPERIENCIAGENERAL" placeholder="Experiencia General" autocomplete="none" value="<?php echo $res->EXPERIENCIAGENERAL ?>" min="1" max="100" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="EXPERIENCIAESPECIFICA">Experiencia Especifica:</label>
      <div class="col-md-8">
        <input type="number" class="form-control input-sm" id="EXPERIENCIAESPECIFICA" name="EXPERIENCIAESPECIFICA" placeholder="Experiencia General" autocomplete="none" value="<?php echo $res->EXPERIENCIAESPECIFICA ?>" min="1" max="100" />
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="FUNCIONES">Funciones:</label>
      <div class="col-md-8">
        <textarea style="height: 100px;" class="form-control input-sm" id="FUNCIONES" name="FUNCIONES" placeholder="Funciones" autocomplete="none"><?php echo str_replace("<br>", "\n", $res->FUNCIONES) ?></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="LUGARTRABAJO">Lugar Trabajo:</label>
      <div class="col-md-8">
        <select class="form-control input-sm" id="LUGARTRABAJO" name="LUGARTRABAJO">
          <?php
          // Lista de opciones
          $diccionario = array(
            "SEDE-CENTRAL" => "SEDE-CENTRAL",
            "ANDAHUAYLILLAS" => "ANDAHUAYLILLAS",
            "APANTA" => "APANTA",
            "CCORCA" => "CCORCA",
            "CHECCA-CANAS" => "CHECCA-CANAS",
            "HANOCCA-TAYPITUNGA" => "HANOCCA-TAYPITUNGA",
            "HUANOQUITE" => "HUANOQUITE",
            "HUAYOPATA" => "HUAYOPATA",
            "LIMATAMBO" => "LIMATAMBO",
            "MARANGANI" => "MARANGANI",
            "MARGEN-DERECHA" => "MARGEN-DERECHA",
            "PALLALLAJE" => "PALLALLAJE",
            "QUISCO" => "QUISCO",
            "SAN-PABLO" => "SAN-PABLO",
            "VERSALLES" => "VERSALLES",
            "YANANTIN" => "YANANTIN",
          );

          // Valor recuperado
          $sql = "Select * From tblVacante WHERE IDVACANTE = $IDVACANTE";
          $mydb->setQuery($sql);
          $rec  = $mydb->loadResultList();
          $lugarTrabajoRecuperado = $rec[0]->LUGARTRABAJO; // valor recuperado de la base de datos

          foreach ($diccionario as $clave => $valor) {
            $selected = ($clave == $lugarTrabajoRecuperado) ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $clave . '">' . $valor . '</option>';
          }
          ?>
        </select>
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