<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
  
// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$empid = $_GET['id'];
    if($empid==''){
  redirect("index.php");
}
 

  $employee = New Employee();
  $emp = $employee->single_employee($empid);
 

  if ($emp->SEX == 'Male') {
    # code...
   $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1" name="optionsRadios" type="radio" value="Female">Female</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  checked="True" name="optionsRadios" type="radio" value="Male">Male</label>
                </div>
              </div> 
             
          </div>';
  }else{
       $radio =  '<div class="col-md-8">
             <div class="col-lg-5">
                <div class="radio">
                  <label><input   id="optionsRadios1"  checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="radio">
                  <label><input id="optionsRadios2"  name="optionsRadios" type="radio" value="Male"> Male</label>
                </div>
              </div> 
             
          </div>';

  }

   switch ($emp->CIVILSTATUS) {

     case 'Single':
       # code...
        $civilstatus =' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Select</option>
                                      <option SELECTED value="Single">Single</option>
                                      <option value="Married">Married</option>
                                      <option value="Widow" >Widow</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     case 'Married':
       # code...
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Select</option>
                                      <option  value="Single">Single</option>
                                      <option SELECTED value="Married">Married</option>
                                      <option value="Widow" >Widow</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';

       break;
     case 'Widow':
       # code...
       $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option value="none" >Select</option>
                                      <option  value="Single">Single</option>
                                      <option  value="Married">Married</option>
                                      <option SELECTED value="Widow" >Widow</option>
                                      <!-- <option value="Fourth" >Fourth</option> -->
                                  </select> ';
       break;
     default:
         $civilstatus=' <select class="form-control input-sm" name="CIVILSTATUS" id="CIVILSTATUS">
                                      <option SELECTED value="none" >Select</option>
                                      <option  value="Single">Single</option>
                                      <option  value="Married">Married</option>
                                      <option  value="Widow" >Widow</option> 
                                  </select> ';
         break;     
       
   }

   switch ($emp->WORKSTATS) {

     case 'Regular':
       # code...
        $workstatus ='
        <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Select</option>
                                      <option value="Temporary">Temporary</option>
                                      <option SELECTED  value="Regular">Regular</option>
                                      <option value="Probationary">Probationary</option> 
                                  </select> ';
       break;

     case 'Regular':
       # code...
        $workstatus ='
        <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Select</option>
                                      <option value="Temporary">Temporary</option>
                                      <option SELECTED value="Regular">Regular</option>
                                      <option value="Probationary">Probationary</option> 
                                  </select> ';
       break;
     case 'Probationary':
       # code...
         $workstatus='
         <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option value="none" >Select</option>
                                      <option value="Temporary">Temporary</option>
                                      <option value="Regular">Regular</option>
                                      <option SELECTED value="Probationary">Probationary</option> 
                                  </select> ';

       break; 
	   
     default:
        $workstatus='
       <select class="form-control input-sm" name="WORKSTATS" id="WORKSTATS">
                                      <option SELECTED value="none" >Select</option>
                                      <option value="Temporary">Temporary</option>
                                      <option value="Regular">Regular</option>
                                      <option value="Probationary">Probationary</option> 
                                  </select> ';
        break;
       
   }

  
 ?> 
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Actualizar Entrevista</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

                 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST"> 
              

                <input  id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->EMPLOYEEID;?>"  >
                   
                
                 <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "FNAME">Apellido Paterno:</label>

                        <div class="col-md-8"> 
                           <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder=
                              "Apellido Paterno" type="text" value="<?php echo $emp->FNAME;?>"   autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "LNAME">Apellido Materno:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="LNAME" name="LNAME" placeholder=
                              "Apellido Materno"   value="<?php echo $emp->LNAME;?>"    autocomplete="off">
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "MNAME">Nombres:</label>

                        <div class="col-md-8"> 
                          <input  class="form-control input-sm" id="MNAME" name="MNAME" placeholder=
                              "Nombres"   value="<?php echo $emp->MNAME;?>"     autocomplete="off">
                           <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
                        </div>
                      </div>
                    </div> 

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Vacantes:</label>

                      <div class="col-md-8">
                        
                         <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder=
                            "Vacantes" type="text" value="" required   autocomplete="off"><?php echo $emp->ADDRESS;?></textarea>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BIRTHDATE">Fecha:</label>

                      <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon"> 
                             <i class="fa fa-calendar"></i> 
                            </span>  
                             <input class="form-control input-sm date_picker" id="BIRTHDATE" name="BIRTHDATE" placeholder="Date of Birth" type="text"    value="<?php echo date_format(date_create($emp->BIRTHDATE),'m/d/Y');?>" required  autocomplete="off">
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "TELNO">Hora:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder=
                                      "Conact No." type="text" any value="<?php echo $emp->TELNO;?>" required   autocomplete="off">
                                </div>
                              </div>
                   </div> 

                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "CIVILSTATUS">Entrevistador:</label>

                                <div class="col-md-8">
                                  <?php echo $civilstatus; ?>
                                </div>
                              </div>
                            </div> 

                        <!--
                         <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for=
                              "COMPANYNAME">Company Name:</label>

                              <div class="col-md-8"> 
                                <select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
                                  <option value="None">Select</option>
                                  <?php 
                                    $sql ="Select * From tblConvocatoria WHERE IDCONVOCATORIA=".$emp->IDCONVOCATORIA;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option SELECTED value='.$row->IDCONVOCATORIA.'>'.$row->COMPANYNAME.'</option>';
                                    }
                                    $sql ="Select * From tblConvocatoria WHERE IDCONVOCATORIA!=".$emp->IDCONVOCATORIA;
                                    $mydb->setQuery($sql);
                                    $result  = $mydb->loadResultList();
                                    foreach ($result as $row) {
                                      # code...
                                      echo '<option value='.$row->IDCONVOCATORIA.'>'.$row->COMPANYNAME.'</option>';
                                    }

                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>  
                        -->
               
                  
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  GUARDAR</button> 
                          <!-- <a href="index.php" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>List of Users</strong></a> -->
                       </div>
                    </div>
                  </div> 
        </form>


             