<?php 
if(!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
}
$autonum = New Autonumber();
$res = $autonum->set_autonumber('employeeid');
?> 

<section id="feature" class="transparent-bg">
        <div class="container">
            <div class="center wow fadeInDown">
                 <h2 class="page-header">Agregar Entrevista</h2>
            </div> 
            <div class="row">
                <div class="features">
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST">
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for="EMPLOYEEID">DNI:</label>

                        <div class="col-md-8"> 
                           <!-- <input class="form-control input-sm" id="EMPLOYEEID" name="EMPLOYEEID" placeholder=
                              "Employee No" type="text" value="<?php echo $res->AUTO; ?>"> -->
                              <input class="form-control input-sm" id="EMPLOYEEID" name="EMPLOYEEID" placeholder=
                              "Employee ID" type="text" value="">
                        </div>
                      </div>
                    </div>           
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for="FNAME">Apellido Paterno:</label>
                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Apellido Paterno" type="text" value=""   autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for= "LNAME">Apellido Materno:</label>
                          <div class="col-md-8">
                            <input name="deptid" type="hidden" value="">
                            <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder = "Apellido Materno" autocomplete="off">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for="MNAME">Nombres:</label>
                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                              "Nombres"     autocomplete="off">
                           <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for= "ADDRESS">VACANTE:</label>
                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                              "Vacante"     autocomplete="off">
                        </div>
                      </div>
                    </div> 
                      <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for=
                              "BIRTHDATE">Fecha y Hora:</label>
                              <div class="col-md-8">
                                <!--<div class="input-group">
                                    <span class="input-group-addon"> 
                                    <!--<i style="position: absolute; left:6px;top:8px;" class="fa fa-calendar fa-sm"></i>
                                    </span>
                                    <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Fecha" type="text" value="" required  autocomplete="off">
                                </div>
                                 -->
                                <input class="form-control" type="datetime-local" id="meeting-time" name="meeting-time" value="2018-06-12T19:30" min="2018-06-07T00:00" max="2018-06-14T00:00">
                              </div>
                            </div>
                      </div>

                      <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CIVILSTATUS">Entrevistador:</label>

                                <div class="col-md-8">
                                  <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Seleccionar</option>
                                      <option value="Single">Entrevistador 1</option>
                                      <option value="Married">Entrevistador 2</option>
                                      <option value="Widow" >Entrevistador 3</option>
                                  </select> 
                                </div>
                              </div>
                            </div>   
                        <div class="form-group">
                      <div class="col-md-8">
                      <label class="col-md-4 control-label" for= "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> GUARDAR</button>
                     </div>
                    </div>
                  </div> 
                  </form>
                </div>
                <!--/.services-->
            </div>
            <!--/.row-->  
        </div>
        <!--/.container-->
</section>
<!--/#feature-->