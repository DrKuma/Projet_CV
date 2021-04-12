<?php

require 'configBDD.inc.php';

$query="SELECT MAX(ID_OFFRE) as id FROM `t_offre`";
	$resultat = $PDO_BDD->query($query);
	foreach($resultat as $x){
		$id=$x['id']+1;
	}

$stmt=$PDO_BDD->prepare("INSERT INTO `t_offre`(`ID_OFFRE`, `TITRE`, `DATE_DEBUT`, `MISSION`, `CONTACT`) VALUES(:id,:titre,:date,:mission,:contact)");
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':titre',$_GET['titre']);
	$stmt->bindParam(':date',$_GET['date']);
	$stmt->bindParam(':mission',$_GET['mission']);
	$stmt->bindParam(':contact',$_GET['contact']);
	$stmt->execute();

header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/php/session.php');

	?>