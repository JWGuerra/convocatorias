<style type="text/css">
  .mailbox-controls .btn {
    padding: 3px 8px;
    margin: 0px 2px;
  }
</style>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">

          <div class="box-header with-border">
            <h3 class="box-title">Notificación</h3>
            <div class="box-tools pull-right" style="margin-bottom: 5px;">
              <div class="has-feedback">
                <input type="text" class="form-control input-sm" placeholder="Buscar Notificación">
                <span class="fa fa-search form-control-feedback" style="margin-top: -25px"></span>
              </div>
            </div>
          </div>

          <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Servicio</th>
                    <th>Funciones</th>
                    <th>Experiencia General</th>
                    <th>Experiencia Específica</th>
                    <th>Remuneracion</th>
                    <th>Fecha Publicación</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //$sql = "SELECT * FROM `tblVacante` j, `tblConvocatoria` c WHERE j.`IDCONVOCATORIA`=c.`IDCONVOCATORIA` ORDER BY FECHAPUBLICACION DESC LIMIT 10";
                  $sql = "SELECT * FROM `tblVacante` ORDER BY FECHAPUBLICACION DESC LIMIT 10";
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();
                  foreach ($cur as $result) {
                    # code...
                    echo '<tr>';
                    echo '<td class="mailbox-name"><a href="' . web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE . '">' . $result->SERVICIO . '</a></td>';
                    echo '<td class="mailbox-subject">' . substr($result->FUNCIONES, 0, 40).'...'. '</td>';
                    echo '<td class="mailbox-date">' . $result->EXPERIENCIAGENERAL . '</td>';
                    echo '<td class="mailbox-date">' . $result->EXPERIENCIAESPECIFICA . '</td>';
                    echo '<td class="mailbox-date">' . $result->REMUNERACION . '</td>';
                    echo '<td class="mailbox-date">' . $result->FECHAPUBLICACION . '</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>