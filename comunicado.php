<section id="content">
    <div class="container content">
        <!-- Service Blcoks -->
        <div class="row">
            <?php
            $sql = "SELECT CONVOCATORIA FROM `tblcomunicado` GROUP BY CONVOCATORIA;";
            $mydb->setQuery($sql);
            $comp = $mydb->loadResultList();
            foreach ($comp as $comunicado) {
            ?>
                <div class="col-sm-4 info-blocks">
                    <i class="icon-info-blocks fa fa-bullhorn"></i>
                    <div class="info-blocks-in">
                        <h3>
                            <li style="list-style-type: none;" class="<?php if (isset($_GET['q'])) {
                                                                            if ($_GET['q'] == 'viewComunicado') {
                                                                                echo 'active';
                                                                            } else {
                                                                                echo '';
                                                                            }
                                                                        }  ?>">
                                <?php echo $comunicado->CONVOCATORIA ?>
                                <h3><?php echo '<a href="' . web_root . 'index.php?q=listaComunicados&search=' . $comunicado->CONVOCATORIA. '">Ver Comunicados</a>'; ?></h3>
                            </li>
                        </h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>