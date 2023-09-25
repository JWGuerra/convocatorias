<?php 
require_once '../include/initialize.php';

// Encontrar la sesión
@session_start();

unset($_SESSION['ADMIN_USERID']);  
unset($_SESSION['ADMIN_FULLNAME']); 
unset($_SESSION['ADMIN_USERNAME']);  
unset($_SESSION['ADMIN_ROLE']); 

// Cerrar la Sesión
redirect(web_root."admin/login.php?logout=1");
?>