<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

$IDSERVICIO = $_GET['id'];
$SERVICIO = new Servicio();
$res = $SERVICIO->single_Servicio($IDSERVICIO);

?>
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
  <fieldset>
    <legend>Actualizar Servicio</legend>
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="SERVICIO">Servicio:</label>
        <div class="col-md-8">
          <input id="IDSERVICIO" name="IDSERVICIO" type="HIDDEN" value="<?php echo $res->IDSERVICIO; ?>">
          <input class="form-control input-sm" id="SERVICIO" name="SERVICIO" placeholder="Servicio" type="text" value="<?php echo $res->SERVICIO; ?>">
        </div>
      </div>
    </div>
    
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="CATEGORIA">Categoría:</label>
        <div class="col-md-8">
          <select class="form-control input-sm" id="CATEGORIA" name="CATEGORIA">
            <option value="None">Seleccionar</option>
            <?php
            $sql = "Select * From tblCategoria";
            $mydb->setQuery($sql);
            $result  = $mydb->loadResultList();
            foreach ($result as $row) {
              $selected = ($row->CATEGORIA == $res->CATEGORIA) ? 'selected' : '';
              echo '<option ' . $selected . ' value="' . $row->CATEGORIA . '" data-remuneracion="' . $row->REMUNERACIONCATEGORIA . '">' . $row->CATEGORIA . '</option>';
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
      // Función para actualizar la remuneración según la categoría seleccionada
      function updateRemuneracion() {
        var categoriaSelect = document.getElementById("CATEGORIA");
        var remuneracionInput = document.getElementById("REMUNERACIONCATEGORIA");
        var selectedOption = categoriaSelect.options[categoriaSelect.selectedIndex];
        var selectedRemuneracion = selectedOption.getAttribute('data-remuneracion');
        remuneracionInput.value = selectedRemuneracion;
      }

      // Se llama a la función cuando se carga la página
      window.onload = updateRemuneracion;

      // Se asocia la función a un evento de cambio en el campo de selección
      var categoriaSelect = document.getElementById("CATEGORIA");
      categoriaSelect.addEventListener("change", updateRemuneracion);
    </script>


    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="idno"></label>

        <div class="col-md-8">
          <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> GUARDAR</button>
        </div>
      </div>
    </div>
  </fieldset>

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