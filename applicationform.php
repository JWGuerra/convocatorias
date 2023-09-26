<section id="content">
    <div class="container content">
        <?php
        if (isset($_GET['search'])) {
            # code...
            $IDVACANTE = $_GET['search'];
        } else {
            $IDVACANTE = '';
        }
        $sql = "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND IDVACANTE LIKE '%" . $IDVACANTE . "%' ORDER BY FECHAPUBLICACION DESC";
        $mydb->setQuery($sql);
        $result = $mydb->loadSingleResult();
        ?>
        <p> <?php check_message(); ?></p>
        <?php
        if (isset($_SESSION['IDPOSTULANTE'])) {
        ?>
            <div class="col-sm-12">
                <div class="row">
                    <h2 class=" ">Detalles de la Vacante</h2>
                    <div class="panel">
                        <div class="panel-header">
                            <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE; ?>"><?php echo $result->SERVICIO; ?></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row contentbody">
                                <div class="col-sm-6">
                                    <ul>
                                        <li><i class="fp-ht-bed"></i>Nro de Vacantes : <?php echo $result->NROVACANTES; ?></li>
                                        <li><i class="fp-ht-food"></i>Remuneración : S/.<?php echo number_format($result->REMUNERACION, 2);  ?></li>
                                        <li><i class="fa fa-sun-"></i>DURACION : <?php echo $result->DURACION; ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul>
                                        <li><i class="fp-ht-computer"></i>Lugar de Trabajo : <?php echo $result->LUGARTRABAJO; ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <p>Experiencia General :</p>
                                    <ul style="list-style: none;">
                                        <li><?php echo $result->EXPERIENCIAGENERAL; ?></li>
                                    </ul>
                                    <p>Experiencia Específica :</p>
                                    <ul style="list-style: none;">
                                        <li><?php echo $result->EXPERIENCIAESPECIFICA; ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <p>Funciones :</p>
                                    <ul style="list-style: none;">
                                        <li><?php echo $result->FUNCIONES; ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <p>Convocatoria : <?php echo  $result->CONVOCATORIA; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            Fecha Publicada : <?php echo date_format(date_create($result->FECHAPUBLICACION), 'M d, Y'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form-horizontal span6 " action="process.php?action=submitapplication&IDVACANTE=<?php echo $result->IDVACANTE; ?>" enctype="multipart/form-data" method="POST">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-header">
                                <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Adjunte su Ficha Resumen Aquí.
                                    <!--<input name="SERVICIO" type="hidden" value="<?php echo $_GET['SERVICIO']; ?>"> -->
                                </div>
                            </div>
                            <div class="panel-body">
                                <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Archivo Adjunto:</label>
                                <div class="col-md-10" style="padding: 0;margin: 0;">
                                    <input id="picture" name="picture" type="file">
                                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit">Entregar<span class="fa fa-arrow-right"></span>
                        </button>
                        <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span>&nbsp;<strong>VOLVER</strong></a>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <form class="form-horizontal span6  wow fadeInDown" action="process.php?action=submitapplication&IDVACANTE=<?php echo $result->IDVACANTE; ?>" enctype="multipart/form-data" method="POST">
                <div class="col-sm-8">
                    <div class="row">
                        <h2 class=" ">Información del postulante</h2>
                        <?php require_once('applicantform.php') ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h2 class=" ">Detalles de la Vacante</h2>
                        <div class="panel">
                            <div class="panel-header">
                                <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE; ?>"><?php echo $result->SERVICIO; ?></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row contentbody">
                                    <div class="col-sm-6">
                                        <ul>
                                            <li><i class="fp-ht-bed"></i>Nro de Vacantes : <?php echo $result->NROVACANTES; ?></li>
                                            <li><i class="fp-ht-food"></i>Remuneración : S/.<?php echo number_format($result->REMUNERACION, 2);  ?></li>
                                            <li><i class="fa fa-sun-"></i>Duración del Contrato : <?php echo $result->DURACION; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul>
                                            <li><i class="fp-ht-computer"></i>Lugar de Trabajo : <?php echo $result->LUGARTRABAJO; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Experiencia General :</p>
                                        <ul style="list-style: none;">
                                            <li><?php echo $result->EXPERIENCIAGENERAL; ?></li>
                                        </ul>
                                        <p>Experiencia Especifica :</p>
                                        <ul style="list-style: none;">
                                            <li><?php echo $result->EXPERIENCIAESPECIFICA; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Funciones :</p>
                                        <ul style="list-style: none;">
                                            <li><?php
                                                echo $result->FUNCIONES;
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>Convocatoria : <?php echo  $result->CONVOCATORIA; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                Fecha Publicada : <?php echo date_format(date_create($result->FECHAPUBLICACION), 'M d, Y'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-header">
                                <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">Adjuntar CV.
                                </div>
                            </div>
                            <div class="panel-body">
                                <label class="col-md-2" for="picture" style="padding: 0;margin: 0;">Archivo Adjunto:</label>
                                <div class="col-md-10" style="padding: 0;margin: 0;">
                                    <input id="picture" name="picture" type="file">
                                    <input name="MAX_FILE_SIZE" type="hidden" value="1000000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-sm pull-right" name="submit" type="submit"> <strong>POSTULAR </strong><span class="fa fa-arrow-right"></span></button>
                        <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-left"></span><strong> VOLVER</strong></a>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</section>