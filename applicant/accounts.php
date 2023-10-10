  <?php
  $applicant = new Postulantes();
  $appl = $applicant->single_Postulante($_SESSION['IDPOSTULANTE']);
  ?>
  <style type="text/css">
    .form-group {
      margin-bottom: 5px;
    }
  </style>
  <form class="form-horizontal" method="POST" action="controller.php?action=edit">
    <div class="container" style="max-width: 100%;">
      <div class="box-header with-border">
        <h3 class="box-title">Cuenta</h3>

        <!-- /.box-tools -->
      </div>
      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="DNI">DNI:</label>
          <div class="col-md-8">
            <!--<input name="IDVACANTE" type="hidden" value="<?php echo $_GET['VACANTE']; ?>"> -->
            <input class="form-control input-sm" id="DNI" name="DNI" placeholder="DNI" type="text" value="<?php echo $appl->DNI; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="APELLIDOS">Apellidos:</label>
          <div class="col-md-8">
            <input class="form-control input-sm" id="APELLIDOS" name="APELLIDOS" placeholder="Apellidos" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->APELLIDOS; ?>">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="NOMBRES">Nombres:</label>
          <div class="col-md-8">
            <input class="form-control input-sm" id="NOMBRES" name="NOMBRES" placeholder="Nombres" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->NOMBRES; ?>">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="DIRECCION">Dirección:</label>
          <div class="col-md-8">
            <textarea class="form-control input-sm" id="DIRECCION" name="DIRECCION" placeholder="Dirección" type="text" value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $appl->DIRECCION; ?></textarea>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="CORREO">Correo:</label>
          <div class="col-md-8">
            <input type="Email" class="form-control input-sm" id="CORREO" name="CORREO" placeholder="Correo" autocomplete="off" value="<?php echo $appl->CORREO; ?>" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="CELULAR">Celular:</label>
          <div class="col-md-8">
            <input class="form-control input-sm" id="CELULAR" name="CELULAR" placeholder="Celular" type="text" any value="<?php echo $appl->CELULAR; ?>" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-3 control-label" for="FORMACIONACADEMICA">Formación Académica:</label>
          <div class="col-md-8">
            <input class="form-control input-sm" id="FORMACIONACADEMICA" name="FORMACIONACADEMICA" placeholder="Formación Académica" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $appl->FORMACIONACADEMICA; ?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-11">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-8">
            <button class="btn btn-primary btn-sm" name="submit" type="submit"><span class="fa fa-save"></span> GUARDAR</button>
          </div>
        </div>
      </div>
    </div>
  </form>