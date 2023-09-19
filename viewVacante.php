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
        $cur = $mydb->loadResultList();


        foreach ($cur as $result) {
        ?>
            <div class="container">
                <div class="mg-available-rooms">
                    <h5 class="mg-sec-left-title">Día de Publicación : <?php echo date_format(date_create($result->FECHAPUBLICACION), 'M d, Y'); ?></h5>
                    <div class="mg-avl-rooms">
                        <div class="mg-avl-room">
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="#"><span class="fa fa-briefcase" style="font-size: 50px"></span><!-- <img src="img/room-1.png" alt="" class="img-responsive"> --></a>
                                </div>
                                <div class="col-sm-10">
                                    <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;"><?php echo $result->SERVICIO; ?>
                                    </div>
                                    <div class="row contentbody">
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fp-ht-bed"></i>N° de Vacantes : <?php echo $result->NROVACANTES; ?></li>
                                                <li><i class="fp-ht-bed"></i>Formacion Profesional : <?php echo $result->FORMACIONACADEMICA; ?></li>
                                                <li><i class="fp-ht-food"></i>Remuneración : <?php echo number_format($result->REMUNERACION, 2);  ?></li>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul>
                                                <li><i class="fa fa-sun-"></i>Duración del Contrato : <?php echo $result->DURACION; ?></li>
                                                <li><i class="fp-ht-computer"></i>Lugar de Trabajo : <?php echo $result->LUGARTRABAJO; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Experiencia General :</p>
                                            <ul style="list-style: none;">
                                                <li><?php echo $result->EXPERIENCIAGENERAL; ?> MESES</li>
                                            </ul>
                                            <p>Experiencia Específica :</p>
                                            <ul style="list-style: none;">
                                                <li><?php echo $result->EXPERIENCIAESPECIFICA; ?> MESES</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Funciones:</p>
                                            <ul style="list-style: none;">
                                                <li><?php
                                                    echo $result->FUNCIONES;;
                                                    ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-12">
                                            <p>Convocatoria:</p>
                                            <ul style="list-style: none;">
                                                <li><?php echo  $result->CONVOCATORIA; ?>
                                                <li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="<?php echo web_root; ?>index.php?q=apply&search=<?php echo $result->IDVACANTE; ?>" class="btn btn-main btn-next-tab">POSTULAR!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</section>