 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if (!isset($_GET['p'])) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Servicios Postulados</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-hover table-striped">
                  <thead> 
                    <tr>
                      <th>Servicio Postulado</th>
                      <th>Convocatoria</th>
                      <th>Remuneración</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $sql="SELECT * FROM `tblConvocatoria` c,`tblRegistroPostulacion` r, `tblVacante` j WHERE c.`IDCONVOCATORIA`=r.`IDCONVOCATORIA` AND r.`IDVACANTE`=j.`IDVACANTE` and r.`IDPOSTULANTE` = {$_SESSION['IDPOSTULANTE']}";
                      $mydb->setQuery($sql);
                      $cur = $mydb->loadResultList();  
                      foreach ($cur as $result) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-star"><a href="index.php?view=appliedjobs&p=job&id='.$result->IDREGISTRO.'"><i class="fa fa-pencil-o text-yellow"></i> '.$result->FORMACIONACADEMICA.'</a></td>';
                          echo '<td class="mailbox-attachment">'.$result->CONVOCATORIA.'</td>';
                          echo '<td class="mailbox-attachment">'.$result->REMUNERACION.'</td>'; 
                          echo '</tr>';
                      } 
                    ?>
       
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <?php }else{
          require_once ("viewjob.php");          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
 