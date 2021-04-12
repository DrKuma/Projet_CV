<?php
session_start();

if (!empty($_SESSION['utilisateur']) || !empty($_SESSION['statut']))
{
	if ($_SESSION['statut']==1) {
		header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter1.php');
	exit();
	} elseif ($_SESSION['statut']==2 xor $_SESSION['statut']==3 ) {
		header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter2.php');
	exit();
	}
	// header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter.php');
	// exit();
}  

if (empty($_SESSION['utilisateur']) && empty($_SESSION['statut']))
{
	header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/index.php');
	exit();
}
?>