
<?php
     if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST">

                <div class="row">
                   <div class="col-lg-12">
                      <h1 class="page-header">Agregar Vacante</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "COMPANYNAME">Convocatoria:</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" id="COMPANYID" name="COMPANYID">
                          <option value="None">Seleccionar</option>
                          <?php 
                            $sql ="Select * From tblcompany";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
                              # code...
                              echo '<option value='.$row->COMPANYID.'>'.$row->COMPANYNAME.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>  

                     <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CATEGORY">Categoría:</label>

                      <div class="col-md-8">
                        <select class="form-control input-sm" id="CATEGORY" name="CATEGORY">
                          <option value="None">Seleccionar</option>
                          <?php 
                            $sql ="Select * From tblcategory";
                            $mydb->setQuery($sql);
                            $res  = $mydb->loadResultList();
                            foreach ($res as $row) {
                              # code...
                              echo '<option value='.$row->CATEGORYID.'>'.$row->CATEGORY.'</option>';
                            }

                          ?>
                        </select>
                      </div>
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "OCCUPATIONTITLE">Profesión / Ocupación:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="OCCUPATIONTITLE" name="OCCUPATIONTITLE" placeholder="Profesión / Ocupación"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                    <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "REQ_NO_EMPLOYEES">N° de Vacantes:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="REQ_NO_EMPLOYEES" name="REQ_NO_EMPLOYEES" placeholder="N° de Vacantes"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SALARIES">Remuneración:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="SALARIES" name="SALARIES" placeholder="Remuneración"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DURATION_EMPLOYEMENT">Duración del contrato:</label> 
                      <div class="col-md-8">
                         <input class="form-control input-sm" id="DURATION_EMPLOYEMENT" name="DURATION_EMPLOYEMENT" placeholder="Duración del Contrato"   autocomplete="none"/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "QUALIFICATION_WORKEXPERIENCE">Experiencia Laboral:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="QUALIFICATION_WORKEXPERIENCE" name="QUALIFICATION_WORKEXPERIENCE" placeholder="Experiencia Laboral" autocomplete="none"></textarea> 
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "JOBDESCRIPTION">Funciones:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="JOBDESCRIPTION" name="JOBDESCRIPTION" placeholder="Funciones"   autocomplete="none"></textarea> 
                      </div>
                    </div>
                  </div>  

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PREFEREDSEX">Género:</label> 
                      <div class="col-md-8">
                          <select class="form-control input-sm" id="PREFEREDSEX" name="PREFEREDSEX">
                          <option value="None">Seleccionar</option>
                           <option>Masculino</option>
                           <option>Femenino</option>
                           <option>Masculino / Femenino</option>
                        </select>
                      </div>
                    </div>
                  </div>  

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SECTOR_VACANCY">Lugar de trabajo:</label> 
                      <div class="col-md-8">
                        <textarea class="form-control input-sm" id="SECTOR_VACANCY" name="SECTOR_VACANCY" placeholder="Lugar de Trabajo"   autocomplete="none"></textarea> 
                      </div>
                    </div>
                  </div>   
                  
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> GUARDAR</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 
 
          
        </form>
      
 