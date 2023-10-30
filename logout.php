<?php
require_once 'include/initialize.php';
// Four steps to closing a session
@session_start();
unset($_SESSION['IDPOSTULANTE']);
unset($_SESSION['NOMBREUSUARIO']);
redirect(web_root . "index.php");