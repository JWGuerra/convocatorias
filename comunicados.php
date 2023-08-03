
<section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->  
        <div class="row">
            <?php 
                  $sql = "SELECT * FROM `tblcompany`";
                  $mydb->setQuery($sql);
                  $comp = $mydb->loadResultList(); 
                  foreach ($comp as $company ) { 
            ?>
                    <div class="col-sm-4 info-blocks">
                        <i class="icon-info-blocks fa fa-bullhorn"></i>
                        <div class="info-blocks-in">
                            <h3>
                                <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='viewComunicado'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="/convocatorias/index.php?q=viewComunicado">Ver Comunicado</a></li>
                                </li>
                            </h3>
                            <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
                            <p>Descripción :<?php echo $company->COMPANYADDRESS;?></p>
                            <p>N° de Comunicado :<?php echo $company->COMPANYCONTACTNO;?></p>
                        </div>
                    </div>
            <?php } ?>
         </div> 
        </div>
    </section>