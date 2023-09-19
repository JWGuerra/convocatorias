<section id="banner">

  <!-- Slider -->
  <div id="main-slider" class="flexslider">
    <ul class="slides">
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/slide1.jpg" alt="" />
        <div class="flex-caption">
          <h3 style="color:white">48 años</h3>
          <p style="color:white">Años al servicio de nuestra región</p>

        </div>
      </li>
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/slide2.jpg" alt="" />
        <div class="flex-caption">
          <h3 style="color:white">134 proyectos</h3>
          <p style="color:white">Ejecutados desde la fundación de la Institución</p>
        </div>
      </li>
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/slide3.jpg" alt="" />
        <div class="flex-caption">
          <h3 style="color:white">10 proyectos</h3>
          <p style="color:white">En ejecución el presente año 2023</p>

        </div>
      </li>
      <li>
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/slide4.jpg" alt="" />
        <div class="flex-caption">
          <h3 style="color:white">10000+</h3>
          <p style="color:white">Hectárias Irrigadas</p>
        </div>
      </li>
    </ul>
  </div>
  <!-- end slider -->

</section>
<section id="call-to-action-2">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h3 style="color:white;">Plan de Mejoramiento de Riego en Sierra y Selva - Plan MERISS</h3>
        <p style="text-align: justify;color:white;">Órgano desconcentrado de segundo nivel organizacional, cuenta con autonomía técnica, económica y administrativa en la medida que las normas lo faculten. Es responsable de coordinar, dirigir, ejecutar, administrar y brindar asistencia especializada en proyectos de inversión relacionados con la gestión integrada y sostenible del riego en cuencas.</p>
      </div>
      <!--  <div class="col-md-2 col-sm-3">
           <a href="#" class="btn btn-primary">Read More</a>
         </div> -->
    </div>
  </div>
</section>

<section id="content">


  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aligncenter">
          <h2 class="aligncenter">CONVOCATORIAS</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. -->
        </div>
        <br />
      </div>
    </div>

    <?php
    $sql = "SELECT * FROM `tblConvocatoria`";
    $mydb->setQuery($sql);
    $comp = $mydb->loadResultList();
    foreach ($comp as $Convocatoria) {
    ?>
      <div class="col-sm-4 info-blocks">
        <i class="icon-info-blocks fa fa-briefcase"></i>
        <div class="info-blocks-in">
          <h3><?php echo $Convocatoria->CONVOCATORIA; ?></h3>
          <p><a href="/convocatorias/index.php?q=convocatoria">Ver Convocatoria</a></p>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aligncenter">
          <h2 class="aligncenter">COMUNICADOS</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. -->
        </div>
        <br />
      </div>
    </div>

    <?php
    $sql = "SELECT CONVOCATORIA FROM `tblcomunicado` GROUP BY CONVOCATORIA;";
    $mydb->setQuery($sql);
    $comp = $mydb->loadResultList();
    foreach ($comp as $comunicado) {
    ?>
      <div class="col-sm-4 info-blocks">
        <i class="icon-info-blocks fa fa-bullhorn"></i>
        <div class="info-blocks-in">
          <h3><?php echo $comunicado->CONVOCATORIA; ?></h3>
          <p><a href="/convocatorias/index.php?q=comunicado">Ver Comunicado</a></p>
        </div>
      </div>

    <?php } ?>
  </div>
</section>

<section class="section-padding gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center">
          <h2>VACANTES POPULARES</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 ">
        <?php
        $sql = "SELECT * FROM `tblVacante`";
        $mydb->setQuery($sql);
        $cur = $mydb->loadResultList();
        foreach ($cur as $result) {
          echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="' . web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE . '">' . $result->SERVICIO . '</a></div>';
        }
        ?>
      </div>
    </div>

  </div>
</section>
<section id="content-3-10" class="content-block data-section nopad content-3-10">
  <div class="image-container col-sm-6 col-xs-12 pull-left">
    <div class="background-image-holder">

    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
        <div class="editContent">
          <h2>NUESTRO EQUIPO</h2>
        </div>
        <div class="editContent" style="height:235px;">
          <p style="text-align: justify;">Mediante el Ordenanza Regional N°176-2020- CR/GR CUSCO de fecha 11.09.2020 se Aprueba el Reglamento de Organización y Funciones del GORE Cusco, el mismo que fuera publicado en el diario Oficial el Peruano con fecha 09.10.2020; y en cuyo Artículo 438° señala que el Plan de Mejoramiento de Riego en Sierra y Selva – Plan MERISS; es un órgano desconcentrado de segundo nivel organizacional, cuenta con autonomía técnica, económica y administrativa en la medida que las normas lo faculten.</p>
        </div>
      </div>
    </div><!-- /.row-->
  </div><!-- /.container -->
</section>

<div class="about home-about">
  <div class="container">
    <div class="block-heading-eight">
      <h2 style="text-align: center;" class="bg-color">PROYECTOS EN EJECUCIÓN</h2>
    </div>
    <br>
    <!-- Inicio Proyectos -->
    <div class="team-six">
      <div style="text-align: center;" class="row">
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/margenDerecha.jpg" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">MARGEN DERECHA</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/checca.jpg" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">CHECCA CANAS</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/Hanocca.png" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">HANOCCA TAYPITUNGA</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/andahuaylillas.png" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">ANDAHUAYLILLAS</div>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/Marangani.jpg" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">MARANGANI</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/versalles.png" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">VERSALLES</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/Limatambo.png" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">LIMATAMBO</div>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-8">
          <!-- Team Member -->
          <div class="proyectoContainer">
            <!-- Image -->
            <img id="proyecto" class="proyectoImage" src="plugins/home-plugins/img/Proyectos/Pallallaje.png" alt="logo" />
            <!-- Name -->
            <div class="middle">
              <div class="proyectoText">PALLALLAJE</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  @media only screen and (max-width: 1200px) {
    .proyectoImage {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, 0%);
    }
  }

  #proyecto {
    border-radius: 5%;
  }


  .proyectoImage {
    position: relative;
    opacity: 1;
    display: block;
    height: 350px;
    padding: 10px;
    transition: .5s ease;
    backface-visibility: hidden;
  }

  .middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
  }

  .proyectoContainer:hover .proyectoImage {
    filter: brightness(0.5);
  }

  .proyectoContainer:hover .middle {
    opacity: 1;
  }

  .proyectoText {
    background-color: #016644;
    border-radius: 10%;
    color: white;
    font-size: 14px;
    padding: 12px 36px;
  }
</style>

</div>