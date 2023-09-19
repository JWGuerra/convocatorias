<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// Encontrar la sesión
@session_start();

// 2. Unset all the session variables
// unset( $_SESSION['USERID'] );
// unset( $_SESSION['FULLNAME'] );
// unset( $_SESSION['USERNAME'] );
// unset( $_SESSION['PASS'] );
// unset( $_SESSION['ROLE'] );

unset($_SESSION['ADMIN_USERID']);  
unset($_SESSION['ADMIN_FULLNAME']); 
unset($_SESSION['ADMIN_USERNAME']);  
unset($_SESSION['ADMIN_ROLE']); 

// Cerrar la Sesión
redirect(web_root."admin/login.php?logout=1");
?>