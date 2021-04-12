<?php
session_start();
require '../php/configBDD.inc.php';
	$requete=$PDO_BDD->prepare("DELETE FROM `t_user` WHERE `ID_USER`=?");
	$requete->execute(array($_GET['id']));
header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/profil_utilisateur.php');
exit();
?>