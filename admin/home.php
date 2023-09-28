<style>
  #datos {
    /* Estilo de borde por defecto */
    border: 2px solid transparent;
    transition: border-color 0.3s;
    /* Transición suave para el cambio de color */
  }

  #datos:hover {
    /* Estilo del borde al pasar el mouse */
    filter: opacity(.5);
  }
</style>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>Panel de control</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div id="datos" style="text-align: center; border-radius:10px;" class="small-box bg-aqua">
        <div class="inner">
          <?php
          $sql = "SELECT COUNT(*) as CANTIDAD FROM tblvacante;";
          $mydb->setQuery($sql);
          $cantVacante = $mydb->loadSingleResult();
          ?>
          <h3><?php echo $cantVacante->CANTIDAD ?></h3>
          <p>Vacantes Publicadas</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div id="datos" style="text-align: center; border-radius:10px;" class="small-box bg-green">
        <div class="inner">
          <?php
          $sql = "SELECT COUNT(*) as CANTIDAD FROM tblRegistroPostulacion;";
          $mydb->setQuery($sql);
          $cantPostulantes = $mydb->loadSingleResult();
          ?>
          <h3><?php echo $cantPostulantes->CANTIDAD ?></h3>
          <p>Postulantes</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div id="datos" style="text-align: center; border-radius:10px;" class="small-box bg-yellow">
        <div class="inner">
          <?php
          $sql = "SELECT COUNT(*) as CANTIDAD FROM tblPostulante;";
          $mydb->setQuery($sql);
          $cantRegistro = $mydb->loadSingleResult();
          ?>
          <h3><?php echo $cantRegistro->CANTIDAD ?></h3>
          <p>Usuarios Registrados</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div id="datos" style="text-align: center;border-radius:10px;" class="small-box bg-red">
        <div class="inner">
          <?php
          $sql = "SELECT COUNT(*) as CANTIDAD FROM tblRegistroPostulacion WHERE OBSERVACIONES = 'NO-APTO';";
          $mydb->setQuery($sql);
          $cantRechazados = $mydb->loadSingleResult();
          ?>
          <h3><?php echo $cantRechazados->CANTIDAD ?></h3>
          <p>Postulantes Descalificados</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="nav-tabs-custom">
        <!-- Tabs within a box -->
        <ul class="nav nav-tabs pull-right">
          <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
          <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
          <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
        </ul>
        <div class="tab-content no-padding">
          <!-- Morris chart - Sales -->
          <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
        </div>
      </div>
      <!-- /.nav-tabs-custom -->

    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

      <!-- Map box -->
      <div class="box box-solid bg-light-blue-gradient">
        <div class="box-header">
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
              <i class="fa fa-minus"></i></button>
          </div>
          <i class="fa fa-map-marker"></i>
          <h3 class="box-title">Dirección</h3>
        </div>
        <div class="box-body">
          <div class="widget">
            <div id="map"></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.1838372037846!2d-71.96506842520111!3d-13.5243069868442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd5fd1923e0bf%3A0x3075ead0f33c8c76!2sPedro%20Vilca%20Apaza%20332%2C%20Cusco%2008002!5e0!3m2!1ses-419!2spe!4v1688740845383!5m2!1ses-419!2spe" width="100%" height="250" style="border:0; border-radius:2%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </ul>
          </div>
        </div>
        <!-- /.box-body-->
        <div class="box-footer no-border">
          <div class="row">
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
              <div id="sparkline-1"></div>
              <div class="knob-label">Dirección:</div>
            </div>
            <!-- ./col -->
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
              <div id="sparkline-2"></div>
              <div class="knob-label">Pedro Vilca Apaza</div>
            </div>
            <!-- ./col -->
            <div class="col-xs-4 text-center">
              <div id="sparkline-3"></div>
              <div class="knob-label">N° 332</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>