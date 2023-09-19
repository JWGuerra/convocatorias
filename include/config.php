<?php
//  Credenciales de acceso Base de datos merissdb
defined('server')   ? null : define("server", "localhost");
defined('user')     ? null : define("user", "root") ;
defined('pass')     ? null : define("pass","");

//  Referencia a la base de datos
defined('database_name') ? null : define("database_name", "merissdb") ;

$this_file      = str_replace('\\', '/', __File__) ;
$doc_root       = $_SERVER['DOCUMENT_ROOT'];
$web_root       =  str_replace (array($doc_root, "include/config.php"), '' , $this_file);

//  Cargamos el archivo de inicio Config
$server_root    = str_replace ('config/config.php' ,'', $this_file);

//  Definimos la raiz de las rutas
define('web_root', $web_root);
define('server_root', $server_root);
?>