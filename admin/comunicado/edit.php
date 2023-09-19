<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

$IDCOMUNICADO = $_GET['id'];
$Comunicado = new Comunicado();
$res = $Comunicado->single_Comunicado($IDCOMUNICADO);

?>
<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">

  <fieldset>
    <legend>Actualizar Comunicado</legend>
    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="COMUNICADO">IDCOMUNICADO:</label>
        <div class="col-md-8">
          <input class="form-control input-sm" id="COMUNICADO" name="IDCOMUNICADO" placeholder="COMUNICADO" type="text" value="<?php echo $res->IDCOMUNICADO; ?>" readonly>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="CONVOCATORIA">Convocatoria:</label>
        <div class="col-md-8">
          <select class="form-control input-sm" id="CONVOCATORIA" name="CONVOCATORIA">
            <option value="None">Seleccionar</option>
            <?php
            $sql = "Select * From tblConvocatoria";
            $mydb->setQuery($sql);
            $result  = $mydb->loadResultList();
            foreach ($result as $row) {
              $selected = ($row->CONVOCATORIA == $res->CONVOCATORIA) ? 'selected' : '';
              echo '<option ' . $selected . ' value="' . $row->CONVOCATORIA . '">' . $row->CONVOCATORIA . '</option>';
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
            <?php
            // Lista de opciones
            $diccionario = array(
              "otros" => "Bases / Ficha Resumen / Fe Erratas",
              "cronogramas" => "Cronogramas",
              "resultados" => "Resultados",
              "comunicados" => "Comunicados"
            );

            // Valor recuperado
            $sql = "Select * From tblComunicado WHERE IDCOMUNICADO = $IDCOMUNICADO";
            $mydb->setQuery($sql);
            $rec  = $mydb->loadResultList();
            $comunicadoRecuperado = $rec[0]->TIPOCOMUNICADO; // valor recuperado de la base de datos

            foreach ($diccionario as $clave => $valor) {
              $selected = ($clave == $comunicadoRecuperado) ? 'selected' : '';
              echo '<option ' . $selected . ' value="' . $clave . '">' . $valor . '</option>';
            }
            ?>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <label class="col-md-4 control-label" for="DESCRIPCION">Descripción:</label>
        <div class="col-md-8">
          <input class="form-control input-sm" id="DESCRIPCION" name="DESCRIPCION" placeholder="Descripción" autocomplete="none" value="<?php echo $res->DESCRIPCION; ?>" />
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-8">
        <?php
        $sql = "SELECT UBICACIONCOMUNICADO FROM tblComunicado where IDCOMUNICADO = $IDCOMUNICADO";
        $mydb->setQuery($sql);
        $ubicacion = $mydb->loadSingleResult();
        unlink($ubicacion->UBICACIONCOMUNICADO);
        ?>
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