<section id="content">
    <div class="container content">
        <!-- Service Blcoks -->

        <table id="dash-table" class="table table-hover">
            <thead>
                <th>Servicio</th>
                <th>Convocatoria</th>
                <th>Experiencia General</th>
                <th>Experiencia Específica</th>
                <th>Remuneración</th>
                <th>Fecha Publicada</th>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search'])) {
                    # code...
                    $CONVOCATORIA = $_GET['search'];
                } else {
                    $CONVOCATORIA = '';
                }
                $sql = "SELECT * FROM `tblConvocatoria` c,`tblVacante` j WHERE c.`IDCONVOCATORIA`=j.`IDCONVOCATORIA` AND CONVOCATORIA LIKE '%" . $CONVOCATORIA . "%' ORDER BY FECHAPUBLICACION DESC";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td><a href="' . web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE . '">' . $result->SERVICIO . '</a></td>';
                    echo '<td>' . $result->CONVOCATORIA . '</td>';
                    echo '<td>' . $result->EXPERIENCIAGENERAL . '</td>';
                    echo '<td>' . $result->EXPERIENCIAESPECIFICA . '</td>';
                    echo '<td>' . $result->REMUNERACION . '</td>';
                    echo '<td>' . date_format(date_create($result->FECHAPUBLICACION), 'm/d/Y') . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>