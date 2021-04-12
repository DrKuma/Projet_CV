<!-- <?php
	//define('DB_Host', 'localhost');
	//define('DB_Port', '3306');
	//define('DB_DataBase','A2019M3104G25');
	//define('DB_UserName','A2019M3104G25');
	//define('DB_PWD','kXDXCHyE');
	
	
//try	
{
//	$PDO_BDD = new PDO('mysql:host='.DB_Host.';port='.DB_Port.';dbname='.DB_DataBase, DB_UserName , DB_PWD);
//	$PDO_BDD -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	$PDO_BDD -> exec("SET NAMES 'UTF8'");
}

//catch(Exception $e)
{
//	echo 'Erreur : '.$e->getMessage().'<br />';
//	echo 'N° : '.$e->getCode();
//	exit();
}
?>
 -->
<?php
define ('DB_HOST','localhost');
define ('DB_PORT','3306');
define ('DB_DATABASE','Projet_M3104');
define ('DB_USERNAME','u_Projet_M3104');
define ('DB_PASSWORD','SJzEeqLb2HHeNYVV');

try
{
	$PDO_BDD=new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_DATABASE,DB_USERNAME,DB_PASSWORD);
	$PDO_BDD->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$PDO_BDD->exec("SET NAMES 'utf8' ");
}

catch(Exception $e)
{
	echo 'Erreur : '.$e->getMessage().'<br/>';
	echo 'N° : '.$e->getCode();
	exit();
}
