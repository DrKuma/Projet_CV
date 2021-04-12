<?php
require "configBDD.inc.php";
$a="deuxpuissancetrois";
$b="egalesix";
$hash_mdp="";
if(strcmp($_GET['mdp'], $_GET['conf_mdp']) === 0)
{
	$hash_mdp=$a.$_GET['mdp'].$b;
	$hash_mdp= sha1($hash_mdp);
	$query="SELECT MAX(ID_USER) as id FROM `t_user`";
	$resultat = $PDO_BDD->query($query);
	foreach($resultat as $x){
		$id=$x['id']+1;
	}
		$id_stat=3;
	$stmt=$PDO_BDD->prepare("INSERT INTO `t_user` VALUES(:id,:mdp,:mail,:nom,:prenom,:id_stat)");
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':mdp',$hash_mdp);
	$stmt->bindParam(':mail',$_GET['mail']);
	$stmt->bindParam(':nom',$_GET['nom']);
	$stmt->bindParam(':prenom',$_GET['prenom']);
	$stmt->bindParam(':id_stat',$id_stat);
	$stmt->execute();
}
	header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/');
					exit();

?>