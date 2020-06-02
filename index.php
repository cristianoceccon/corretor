<?php
session_start();
require 'vendor/autoload.php';
require 'config.php';

//ATIVAR PARA VERIFICAR SE EXISTE ERRO!

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

spl_autoload_register(function($class){
  if(file_exists('Controllers/'.$class.'.php')){

  	require 'Controllers/'.$class.'.php';

  } else if(file_exists('Models/'.$class.'.php')){
    
    require 'Models/'.$class.'.php';

  } else if(file_exists('Core/'.$class.'.php')){
    
    require 'Core/'.$class.'.php';

  }
});
$core = new Core();
$core->run();
?>

