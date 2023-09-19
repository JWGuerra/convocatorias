<section id="content">
    <div class="container content">
        <?php
        if (isset($_GET['search'])) {
            # code...
            $SERVICIO = $_GET['search'];
        } else {
            $SERVICIO = '';
        }
        $sql = "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND SERVICIO LIKE '%" . $SERVICIO . "%' ORDER BY FECHAPUBLICACION DESC";
        $mydb->setQuery($sql);
        $cur = $mydb->loadResultList();


        foreach ($cur as $result) {
        ?>

            <div class="panel panel-primary">
                <div class="panel-header">
                    <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 20px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE; ?>"><?php echo $result->FORMACIONACADEMICA; ?></a>
                    </div>
                </div>
                <div class="panel-body contentbody">
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            <p>Experiencia Laboral :</p>
                            <ul style="list-style: none;">
                                <li>Experiencia General:<?php echo $result->EXPERIENCIAGENERAL; ?></li>
                                <li>Experiencia Específica: <?php echo $result->EXPERIENCIAESPECIFICA; ?></li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <p>Funciones:</p>
                            <ul style="list-style: none;">
                                <li><?php echo $result->FUNCIONES; ?></li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <p>Nombre Convocatoria: <?php echo  $result->CONVOCATORIA ?></p>
                        </div>
                    </div>
                    <div class="col-sm-2"> <a href="<?php echo web_root; ?>index.php?q=postulacion&vacante=<?php echo $result->IDVACANTE; ?>&view=personalinfo" class="btn btn-main btn-next-tab">Postular Ahora!</a></div>
                </div>
                <div class="panel-footer">
                    Fecha de Publicación : <?php echo date_format(date_create($result->FECHAPUBLICACION), 'M d, Y'); ?>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>