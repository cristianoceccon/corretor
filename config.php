<?php
require 'environment.php';
/*
EMAIL PAGSEGURO ARTE BORDA: arte_borda@hotmail.com
TOKEN PAGSEGURO ARTE BORDA: 
5d99826e-4b99-4cdd-b161-28b8d173a8706cc450af48cdb3a561f82c3fd2be98cae85c-7984-45dd-aaec-a4d65f0ad6cc
*/
global $config;
global $db;
$config = array();

if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://localhost:8888/corretor/");
	define("BASE_URL_SITE", "http://localhost:8888/corretor/");
	define("BASE_DIRECTORY", "../corretor/");
	$config['dbname'] = 'ofertac1_corretor';
	$config['host'] = 'localhost';
	$config['port'] = '8889';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

	//Informações do gerencianet
	$config['gerencianet_clientid'] = 'Client_Id_bfff87dacbfdd273ef59273b88dd496ba22eb76a';
	$config['gerencianet_clientsecret'] = 'Client_Secret_4b8e68de361432db232531b29d59cff677994547';
	$config['gerencianet_sandbox'] = true;
	$config['pagseguro_seller'] = 'diegobaron_bjo@hotmail.com';

} else {
	define("BASE_URL", "https://www.ofertacobrasil.com.br/corretor/");
	define("BASE_URL_SITE", "https://www.ofertacobrasil.com.br/");
	define("BASE_DIRECTORY", "../ofertacobrasil/");
	$config['dbname'] = 'ofertac1_corretor';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'ofertac1_corretor';
	$config['dbpass'] = 'D8h5g0x3123..';

	//Informações do gerencianet
	$config['gerencianet_clientid'] = 'Client_Id_c08a750c0efafdbf06661c1432966341d234ef1e';
	$config['gerencianet_clientsecret'] = 'Client_Secret_2d0c068d23ff143b8aa9e4dcef159e090ce47075'; 
	$config['gerencianet_sandbox'] = false;
	$config['pagseguro_seller'] = 'arte_borda@hotmail.com';
}

$config['default_lang'] = 'pt-br';
$config['cep_origin'] = '89872000';


try {
	
	$db = new PDO("mysql:host=".$config['host'].";port=".$config['port'].";dbname=".$config['dbname'], $config['dbuser'], $config['dbpass']);
	$db->query("SET NAMES 'utf8'");
  	$db->query("SET character_set_connection=utf8");
  	$db->query("SET character_set_client=utf8");
  	$db->query("SET character_set_results=utf8");

} catch(PDOException $Exception) {
	echo "<pre>";
	print_r($Exception);
	exit;
}

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("ArteBorda")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("ArteBorda")->setRelease("1.0.0");
if(ENVIRONMENT == "development"){
  \PagSeguro\Configuration\Configure::setEnvironment('sandbox');
  \PagSeguro\Configuration\Configure::setAccountCredentials('diegobaron_bjo@hotmail.com', '6CAB81867BDF4C7CB22E85EC7244020C');
} else {
  \PagSeguro\Configuration\Configure::setEnvironment('production');
  \PagSeguro\Configuration\Configure::setAccountCredentials('arte_borda@hotmail.com', '5d99826e-4b99-4cdd-b161-28b8d173a8706cc450af48cdb3a561f82c3fd2be98cae85c-7984-45dd-aaec-a4d65f0ad6cc');
}
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');