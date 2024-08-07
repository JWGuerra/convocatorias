<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PLAN MERISS / <?php echo $title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="http://www.meriss.gob.pe/plan/" />
  <!-- CSS -->
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/flexslider.css" rel="stylesheet" />
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo web_root; ?>plugins/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>plugins/dataTables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>plugins/dataTables/jquery.dataTables_themeroller.css">
  <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link href="<?php echo web_root; ?>plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">
  <link href="<?php echo web_root; ?>plugins/home-plugins/css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo web_root; ?>dist/css/skins/myStyles.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>dist/css/templateStyle.css">
  <!-- ICONOS -->
  <link rel="icon" href="icono.ico" type="image/x-icon">

</head>

<body>


  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script>
    // Mostrar la ventana modal automáticamente cuando se carga la página
    $(window).on('load', function() {
      $('#modalConvocatoria').modal('show');
    });
  </script>
  <div id="wrapper" class="home-page">
    <header>
      <div style="height: 35px;" class="topbar navbar-fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p style="font-size: 14px;" class="pull-left hidden-xs"><i style="color: white;" class="fa fa-phone"></i>N° Teléfono: 084-232639
              </p>
              <?php if (isset($_SESSION['IDPOSTULANTE'])) {
                $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tblVacante` ORDER BY `FECHAPUBLICACION` DESC";
                $mydb->setQuery($sql);
                $showNotif = $mydb->loadSingleResult();
                $notif = isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;
                $postulante = new Postulantes();
                $appl  = $postulante->single_Postulante($_SESSION['IDPOSTULANTE']);
                $sql = "SELECT count(*) as 'COUNT' FROM `tblRegistroPostulacion` WHERE `SOLICITUDPENDIENTE`=0 AND `HVISTA`=0 AND `IDPOSTULANTE`='{$appl->IDPOSTULANTE}'";
                $mydb->setQuery($sql);
                $showMsg = $mydb->loadSingleResult();
                $msg = isset($showMsg->COUNT) ? $showMsg->COUNT : 0;

                echo ' <p style="font-size: 14px;" class="pull-right login">
                <a title="Ver Notificación(s)" href="' . web_root . 'applicant/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">' . $notif . '</span></a> |
                <a title="Ver Mensaje(s)" href="' . web_root . 'applicant/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">' . $msg . '</span></a> | 
                <a title="Ver Perfil" href="' . web_root . 'applicant/"> <i class="fa fa-user"></i> Postulante, ' . $appl->APELLIDOS . ' ' . $appl->NOMBRES . ' </a> | 
                <a href="' . web_root . 'logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> </p>';
              } else { ?>
                <p style="font-size: 14px;" class="pull-right login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Iniciar Sesión Postulante</a></p>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
      <div style="min-height: 30px;"></div>
      <div class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a style="color: black;" class="navbar-brand" href="<?php echo web_root; ?>index.php">Plan MERISS<img src="<?php echo web_root; ?>plugins/home-plugins/img/Logo_plan_meriss.png" alt="logo" height="40px" /></a>
          </div>
          <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
              <li class="<?php echo !isset($_GET['q']) ? 'active' : '' ?>"><a href="<?php echo web_root; ?>index.php">Inicio</a></li>

              <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'convocatoria') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=convocatoria">Vacantes Publicadas</a></li>
              <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'comunicado') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=comunicado">Comunicados</a></li>
              <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'solicitud_trabajo_form') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=solicitud_trabajo_form">Solicitud Trabajo</a></li>
              <li class="<?php if (isset($_GET['q'])) {
                            if ($_GET['q'] == 'About') {
                              echo 'active';
                            } else {
                              echo '';
                            }
                          }  ?>"><a href="<?php echo web_root; ?>index.php?q=About">Nosotros</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <!--BARRA SOCIAL FIJA-->
    <div class="social">
      <ul>
        <li><a href="https://www.facebook.com/planmerissgorecusco" data-placement="right" title="Facebook" target="_blank" class="icon-facebook"><i class="fa fa-facebook fa-lg"></i></a></li>
        <li><a href="https://twitter.com/merisscusco" data-placement="right" title="Twitter" target="_blank" class="icon-twitter"><i class="fa fa-twitter fa-xs"></i></a></li>
        <li><a href="https://www.instagram.com/planmerisscusco/" data-placement="right" title="Instagram" target="_blank" class="icon-instagram"><i class="fa fa-instagram fa-xs"></i></a></li>
        <li><a href="https://m.youtube.com/channel/UC2t1z8uNAHOuqgEDa7kM8-A" data-placement="right" title="You Tube" target="_blank" class="icon-youtube"><i class="fa fa-youtube fa-xs"></i></a></li>
      </ul>
    </div>
    <!-- end header -->

    <div class="floating-button">
      <span class="texto"><strong>LOGIN ADMIN</strong></span>
      <a title="LOGIN ADMIN" href="<?php echo web_root; ?>admin/" class="btn-wsp" target="_blank"><i class="fa fa-user"></i></a>
    </div>

    <?php
    if (!isset($_SESSION['IDPOSTULANTE'])) {
      include("login.php");
    }
    ?>
    <?php

    if (isset($_GET['q'])) {
      # code...
      echo '<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">' . $title . '</h2>
                    </div>
                </div>
            </div>
            </section>';
    }
    require_once $content;
    ?>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">CONTACTANOS</h5>
              <ul class="link-list">
                <li>Central telefónica: 084-232639</li>
                <li>Correo: pmeriss@meriss.gob.pe</li>
                <li>Página Web: <a href="http://www.meriss.gob.pe/plan/" target="_blank">http://www.meriss.gob.pe/plan/</a> </li>
              </ul>
            </div>
          </div>

          <div class="col-md-3 col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">LINK DIRECTOS</h5>
              <ul class="link-list">
                <li><a href="<?php echo web_root; ?>index.php">Inicio</a></li>
                <li><a href="<?php echo web_root; ?>index.php?q=convocatoria">Convocatorias</a></li>
                <li><a href="<?php echo web_root; ?>index.php?q=hiring">Vacantes Publicadas</a></li>
                <li><a href="<?php echo web_root; ?>index.php?q=About">Acerca de Nosotros</a></li>
                <li><a href="<?php echo web_root; ?>index.php?q=comunicados">Comunicados</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">ULTIMAS PUBLICACIONES</h5>
              <ul class="link-list">
                <?php
                $sql = "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA`   ORDER BY FECHAPUBLICACION DESC LIMIT 3";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {
                  echo ' <li><a href="' . web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE . '">' . $result->CONVOCATORIA . '/ ' . $result->SERVICIO . '</a></li>';
                }
                ?>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="widget">
              <h5 class="widgetheading">DIRECCION</h5>
              <div id="map"></div>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.1838372037846!2d-71.96506842520111!3d-13.5243069868442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x916dd5fd1923e0bf%3A0x3075ead0f33c8c76!2sPedro%20Vilca%20Apaza%20332%2C%20Cusco%2008002!5e0!3m2!1ses-419!2spe!4v1688740845383!5m2!1ses-419!2spe" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="copyright">
                <p>
                  <span> Copyright &copy; Plan MERISS 2023. Todos los derechos reservados
                </p>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="social-network">
                <li><a href="https://www.facebook.com/planmerissgorecusco" target="_blank" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/merisscusco" target="_blank" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/planmerisscusco/" target="_blank" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://m.youtube.com/channel/UC2t1z8uNAHOuqgEDa7kM8-A" target="_blank" data-placement="top" title="You Tube"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js"></script>
  <script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.fancybox-media.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.flexslider.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/modernizr.custom.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.isotope.min.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/animate.js"></script>
  <script src="<?php echo web_root; ?>plugins/home-plugins/js/custom.js"></script>

  <script type="text/javascript">
    $(function() {
      $("#dash-table").DataTable();
      $('#dash-table2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });


    $("#btnlogin").click(function() {
      var username = document.getElementById("NOMBREUSUARIO");
      var pass = document.getElementById("CONTRASENA");
      if (username.value == "" && pass.value == "") {
        $('#loginerrormessage').fadeOut();
        $('#loginerrormessage').fadeIn();
        $('#loginerrormessage').css({
          "background": "red",
          "color": "#fff",
          "padding": "5px;"
        });
        $("#loginerrormessage").html("Usuario y Contraseña Inválidos!");
      } else {
        $.ajax({ //create an ajax request to load_page.php
          type: "POST",
          url: "process.php?action=login",
          dataType: "text", //expect html to be returned  
          data: {
            NOMBREUSUARIO: username.value,
            CONTRASENA: pass.value
          },
          success: function(data) {
            $('#loginerrormessage').fadeOut();
            $('#loginerrormessage').fadeIn();
            $('#loginerrormessage').css({
              "background": "red",
              "color": "#fff",
              "padding": "5px;"
            });
            $('#loginerrormessage').html(data);
          }
        });
      }
    });


    $('input[data-mask]').each(function() {
      var input = $(this);
      input.setMask(input.data('mask'));
    });


    $('#BIRTHDATE').inputmask({
      mask: "2/1/y",
      placeholder: "mm/dd/yyyy",
      alias: "date",
      hourFormat: "24"
    });
    $('#HIREDDATE').inputmask({
      mask: "2/1/y",
      placeholder: "mm/dd/yyyy",
      alias: "date",
      hourFormat: "24"
    });

    $('.date_picker').datetimepicker({
      format: 'mm/dd/yyyy',
      startDate: '01/01/1950',
      language: 'en',
      weekStart: 1,
      todayBtn: 1,
      autoclose: 1,
      todayHighlight: 1,
      startView: 2,
      minView: 2,
      forceParse: 0

    });
  </script>
</body>

</html>