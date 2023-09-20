<section id="content">
    <div class="container content">
        <!-- Service Blcoks -->

        <table id="dash-table" class="table table-hover">
            <thead>
                <th>Convocatoria</th>
                <th>Descripción</th>
                <th>Fecha Publicación</th>
                <th>Ver Documento</th>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['search'])) {
                    # code...
                    $CONVOCATORIA = $_GET['search'];
                } else {
                    $CONVOCATORIA = '';
                }
                $sql = "SELECT * FROM `tblComunicado` WHERE CONVOCATORIA = '$CONVOCATORIA' ORDER BY FECHAPUBLICACION DESC;";
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {
                    echo '<tr>';
                    //echo '<td><a href="' . web_root . 'index.php?q=viewVacante&search=' . $result->IDVACANTE . '">' . $result->SERVICIO . '</a></td>'; 
                    echo '<td>' . $result->CONVOCATORIA . '</td>';
                    echo '<td>' . $result->DESCRIPCION . '</td>';
                    echo '<td>' . date_format(date_create($result->FECHAPUBLICACION), 'm/d/Y') . '</td>';
                    //echo '<td>' . $result->CONVOCATORIA . '</td>';
                    echo '<td align="center"><a style = "border-radius:15%; padding: 4px 10px;" href="'. web_root.'index.php?q=viewComunicado&search=' . $result->IDCOMUNICADO . '" class="btn btn-primary btn-xs  ">  <span style="color:#FFFF;" class="fa fa-eye fa-lg"></a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</section>