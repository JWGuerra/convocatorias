<?php
require_once ("../../include/initialize.php");
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ($_POST['U_NAME'] == "" OR $_POST['U_USERNAME'] == "" OR $_POST['U_PASS'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$user = New User();
			$user->USERID 			= $_POST['user_id'];
			$user->FULLNAME 		= $_POST['U_NAME'];
			$user->USERNAME			= $_POST['U_USERNAME'];
			$user->PASS				=sha1($_POST['U_PASS']);
			$user->ROLE				=  $_POST['U_ROLE'];
			$user->create();

						$autonum = New Autonumber(); 
						$autonum->auto_update('userid');

			message("La cuenta [". $_POST['U_NAME'] ."] fue creado exitosamente!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){


			$user = New User(); 
			$user->FULLNAME 		= $_POST['U_NAME'];
			$user->USERNAME			= $_POST['U_USERNAME'];
			$user->PASS				=sha1($_POST['U_PASS']);
			$user->ROLE				= $_POST['U_ROLE'];
			$user->update($_POST['USERID']);

			


			if (isset($_GET['view'])) {
				# code...
				  message("El perfil fue actualizado!", "success");
				redirect("index.php?view=view");
			}else{ 
				message("[". $_POST['U_NAME'] ."] fue actualizado!", "success");
				redirect("index.php");
			}
		}
	}


	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New User();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$user = New User();
	 		 	$user->delete($id);
			 
			message("Usuario eliminado!","info");
			redirect('index.php');
		// }
		// }

		
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("Imgen no seleccionado!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("El archivo cargado no es una imagen!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
						$user = New User();
						$user->PICLOCATION 			= $location;
						$user->update($_SESSION['ADMIN_USERID']);
						redirect("index.php?view=view");	
					}
			}	 
		}
?>