<?php
require "configBDD.inc.php";
if(strcmp($_GET['mdp'], $_GET['conf_mdp']) !== 0)
{
	if(!empty($_GET['entreprise']))
	{
		header('http://localhost:8080/Projet_PHP_2019_2020/projet/html/Inscription_entreprise.html');
		exit();	
	}
	header('http://localhost:8080/Projet_PHP_2019_2020/projet/html/Inscription_membre.html');
	exit();	
}
$a="deuxpuissancetrois";
$b="egalesix";
$hash_mdp="";
if(strcmp($_GET['mdp'], $_GET['conf_mdp']) === 0)
{
	$hash_mdp=$a.$_GET['mdp'].$b;
	$hash_mdp= sha1($hash_mdp);
	//$query="SELECT MAX(ID_USER) as id FROM t_user";
	$resultat = $PDO_BDD->query('SELECT MAX(ID_USER) as id FROM `t_user`');
	foreach($resultat as $x){
		$id=$x['id']+1;
	}
	if(!empty($_GET['entreprise'])){
		$id_stat=2;
	}
	else{
		$id_stat=1;
	}
	$stmt=$PDO_BDD->prepare("INSERT INTO `t_user` VALUES(:id,:mdp,:mail,:nom,:prenom,:id_stat)");
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':mdp',$hash_mdp);
	$stmt->bindParam(':mail',$_GET['mail']);
	$stmt->bindParam(':nom',$_GET['nom']);
	$stmt->bindParam(':prenom',$_GET['prenom']);
	$stmt->bindParam(':id_stat',$id_stat);
	$stmt->execute();
	if(!empty($_GET['entreprise']))
	{
		$actif=0;
		$query="SELECT MAX(ID_ENTREPRISE) as id FROM `t_entreprise`";
		$resultat = $PDO_BDD->query($query);
		foreach($resultat as $x){
			$id_entreprise=$x['id']+1;
		}
		$stmt=$PDO_BDD->prepare("INSERT INTO `t_entreprise` VALUES(:id_ent,:rs_s,:tel,:id,:acf)");
		$stmt->bindParam(':id_ent',$id_entreprise);
		$stmt->bindParam(':rs_s',$_GET['rs_sociale']);
		$stmt->bindParam(':tel',$_GET['tel_entreprise']);
		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':acf',$actif);
		$stmt->execute();
	}
	if(empty($_GET['entreprise']))
	{
		$query="SELECT MAX(ID_MEMBRE) as id FROM `t_membre`";
		$resultat = $PDO_BDD->query($query);
		foreach($resultat as $x){
			$id_membre=$x['id']+1;
		}
		$stmt=$PDO_BDD->prepare("INSERT INTO `t_membre` VALUES(:id_mb,:date,:tel,:id,:diplome)");
		$stmt->bindParam(':id_mb',$id_membre);
		$stmt->bindParam(':date',$_GET['date_nais']);
		$stmt->bindParam(':tel',$_GET['tel_membre']);
		$stmt->bindParam(':id',$id);
		$stmt->bindParam(':diplome',$_GET['diplome']);
		$stmt->execute();
	}
}
					header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/');
					exit();
