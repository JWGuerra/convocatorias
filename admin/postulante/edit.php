<?php
if (!isset($_SESSION['ADMIN_USERID'])) {
  redirect(web_root . "admin/index.php");
}

@$empid = $_GET['id'];
if ($empid == '') {
  redirect("index.php");
}


$employee = new Postulantes();
$emp = $employee->single_postulante($empid);

?>

<div class="center wow fadeInDown">
  <h2 class="page-header">Update Employee</h2>
  <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
</div>


<form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST">


  <input id="EMPLOYEEID" name="EMPLOYEEID" type="hidden" value="<?php echo $emp->EMPLOYEEID; ?>">


  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="FNAME">Firstname:</label>

      <div class="col-md-8">
        <input class="form-control input-sm" id="FNAME" name="FNAME" placeholder="Firstname" type="text" value="<?php echo $emp->FNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="LNAME">Lastname:</label>

      <div class="col-md-8">
        <input class="form-control input-sm" id="LNAME" name="LNAME" placeholder="Lastname" value="<?php echo $emp->LNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="MNAME">Middle Name:</label>

      <div class="col-md-8">
        <input class="form-control input-sm" id="MNAME" name="MNAME" placeholder="Middle Name" value="<?php echo $emp->MNAME; ?>" onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
        <!-- <input class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" type="text" value=""> -->
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="ADDRESS">Address:</label>

      <div class="col-md-8">

        <textarea class="form-control input-sm" id="ADDRESS" name="ADDRESS" placeholder="Address" type="text" value="" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $emp->ADDRESS; ?></textarea>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="TELNO">Conact No.:</label>

      <div class="col-md-8">

        <input class="form-control input-sm" id="TELNO" name="TELNO" placeholder="Conact No." type="text" any value="<?php echo $emp->TELNO; ?>" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="POSITION">Postion:</label>

      <div class="col-md-8">

        <input class="form-control input-sm" id="POSITION" name="POSITION" placeholder="Postion" type="text" any value="<?php echo $emp->POSITION; ?>" required onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="DATEHIRED">Hired Date:</label>

      <div class="col-md-8">
        <div class="input-group ">
          <!-- <label><?php echo date_format(date_create($emp->BIRTHDATE), 'm/d/Y'); ?> </label>  
                                      <i class="fa fa-calendar"></i>  -->
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input id="datemask2" name="DATEHIRED" value="<?php echo date_format(date_create($emp->DATEHIRED), 'm/d/Y'); ?>" type="text" class="form-control input-sm datemask2" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required>

        </div>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="EMP_EMAILADDRESS">Email Address:</label>
      <div class="col-md-8">
        <input type="Email" class="form-control input-sm" id="EMP_EMAILADDRESS" name="EMP_EMAILADDRESS" placeholder="Email Address" autocomplete="false" value="<?php echo  $emp->EMP_EMAILADDRESS; ?>" />
      </div>
    </div>
  </div>


  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="CONVOCATORIA">Convocatoria:</label>

      <div class="col-md-8">
        <select class="form-control input-sm" id="IDCONVOCATORIA" name="IDCONVOCATORIA">
          <option value="None">Select</option>
          <?php
          $sql = "Select * From tblConvocatoria WHERE IDCONVOCATORIA=" . $emp->IDCONVOCATORIA;
          $mydb->setQuery($sql);
          $result  = $mydb->loadResultList();
          foreach ($result as $row) {
            # code...
            echo '<option SELECTED value=' . $row->IDCONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
          }
          $sql = "Select * From tblConvocatoria WHERE IDCONVOCATORIA!=" . $emp->IDCONVOCATORIA;
          $mydb->setQuery($sql);
          $result  = $mydb->loadResultList();
          foreach ($result as $row) {
            # code...
            echo '<option value=' . $row->IDCONVOCATORIA . '>' . $row->CONVOCATORIA . '</option>';
          }

          ?>
        </select>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-8">
      <label class="col-md-4 control-label" for="idno"></label>
      <div class="col-md-8">
        <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>
      </div>
    </div>
  </div>

</form>