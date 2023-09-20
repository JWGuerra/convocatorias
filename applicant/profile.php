<?php
$view = isset($_GET['view']) ? $_GET['view'] : "";
$appl = new Postulantes();
$applicant = $appl->single_Postulante($_SESSION['IDPOSTULANTE']);
?>
<style type="text/css">
  .panel-body img {
    width: 100%;
    height: 50%;
  }

  .panel-body img:hover {
    cursor: pointer;
  }
</style>

<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="pageTitle">PERFIL</h2>
      </div>
    </div>
  </div>
</section>

<div class="container" style="margin-top: 10px;min-height: 600px;">
  <div class="row">
    <div class="col-sm-3"><!--left col-->
      <div class="panel panel-default">
        <div class="panel-body">
          <div id="image-container" style="text-align: center;">
            <i style="font-size: 150px; color:#428BCA;" class="fa fa-user"></i>
          </div>
        </div>
        <ul class="list-group">
          <li class="list-group-item text-muted">PERFIL</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Nombre: </strong></span>
            <?php echo $applicant->APELLIDOS . ' ' . $applicant->NOMBRES; ?>
          </li>
        </ul>
        <div class="box box-solid">
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li class="<?php echo ($view == 'appliedjobs' || $view == '') ? 'active' : ''; ?>">
                <a href="<?php echo web_root . 'applicant/index.php?view=appliedjobs'; ?>"><i class="fa fa-list"></i> Vacantes Postuladas</a>
              </li>
              <li class="<?php echo ($view == 'accounts') ? 'active' : ''; ?>">
                <a href="<?php echo web_root . 'applicant/index.php?view=accounts'; ?>"><i class="fa fa-user"></i> Cuenta </a>
              </li>
              <li class="<?php echo ($view == 'message') ? 'active' : ''; ?>">
                <a href="<?php echo web_root . 'applicant/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Mensajes
                  <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0; ?></span></a>
              </li>
              <li class="<?php echo ($view == 'notification') ? 'active' : ''; ?>">
                <a href="<?php echo web_root . 'applicant/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notification <span class="label label-success pull-right"><?php echo $notif; ?></span></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-9">
      <?php
      check_message();
      check_active();
      ?>

      <h1 style="color: #016644;"><?php echo $applicant->APELLIDOS . ' ' . $applicant->NOMBRES; ?> </h1>
      <?php
      switch ($view) {
        case 'message':
          # code...
          require_once("message.php");
          break;
        case 'notification':
          # code...
          require_once("notification.php");
          break;
        case 'appliedjobs':
          # code...
          require_once("appliedjobs.php");
          break;
        case 'accounts':
          # code...
          require_once("accounts.php");
          break;
        default:
          # code...
          require_once("appliedjobs.php");
          break;
      }
      ?>
    </div><!--/col-sm-9-->
  </div><!--/row-->
</div><!--/contanier-->

<?php
unset($_SESSION['appliedjobs']);
unset($_SESSION['accounts']);
?>

<!-- VENTANA MODAL PARA SUBIR LA FOTO -->
<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" data-dismiss="modal" type="button">X</button>
        <h4 class="modal-title" id="myModalLabel">Elegir Imagen</h4>
      </div>
      <form action="controller.php?action=photos" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <div class="rows">
              <div class="col-md-12">
                <div class="rows">
                  <div class="col-md-8">
                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000"> <input id="photo" name="photo" type="file">
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="savephoto" type="submit">Cargar Foto</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->