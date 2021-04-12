<?php
require "configBDD.inc.php";
session_start();
if (!empty($_SESSION['utilisateur']) && !empty($_SESSION['statut']))
{
	
	if ($_SESSION['statut']==2)
		{
$mail=$PDO_BDD->prepare("SELECT UTI_MAIL FROM `t_user` where UTI_MAIL=?");
	$update=$PDO_BDD->prepare("UPDATE `t_user` SET `UTI_MAIL`=:mail,`UTI_NOM`=:nom,`UTI_PRENOM`=:prenom WHERE UTI_MAIL=:Session_mail");
	$stmt=$PDO_BDD->prepare("UPDATE `t_entreprise` SET `RAISON_SOCIALE`=:rs_s,`TEL`=:tel WHERE ID_USER=(SELECT ID_USER FROM `t_user` where UTI_MAIL=:Session_mail)");
		
				$update->bindParam(':mail',$_GET['mail']);
				$update->bindParam(':nom',$_GET['nom']);
				$update->bindParam(':prenom',$_GET['prenom']);
				$update->bindParam(':Session_mail',$_SESSION['utilisateur']);
			$stmt->bindParam(':rs_s',$_GET['rs_sociale']);
			$stmt->bindParam(':tel',$_GET['tel_entreprise']);
			$stmt->bindParam(':Session_mail',$_SESSION['utilisateur']);
			
			$stmt->execute();
			$update->execute();
			
			$mail->execute($_GET['mail']);
			
			$_SESSION['utilisateur']=$_GET['mail'];
		}
		if ($_SESSION['statut']==1)
		{
			$mail=$PDO_BDD->prepare("SELECT UTI_MAIL FROM `t_user` where UTI_MAIL=?");
				$update2=$PDO_BDD->prepare("UPDATE `t_user` SET `UTI_MAIL`=:mail,`UTI_NOM`=:nom,`UTI_PRENOM`=:prenom WHERE UTI_MAIL=:Session_mail");
			$stmt2=$PDO_BDD->prepare("UPDATE `t_membre` SET `DATE_NAIS`=:datenais,`TEL`=:tel,`DIPLOME_PREP`=:dip WHERE ID_USER=(SELECT ID_USER FROM `t_user` where UTI_MAIL=:Session_mail)");
		
				$update2->bindParam(':mail',$_GET['mail']);
				$update2->bindParam(':nom',$_GET['nom']);
				$update2->bindParam(':prenom',$_GET['prenom']);
				$update2->bindParam(':Session_mail',$_SESSION['utilisateur']);
			$stmt2->bindParam(':datenais',$_GET['date_nais']);
			$stmt2->bindParam(':tel',$_GET['tel_membre']);
			$stmt2->bindParam(':dip',$_GET['Diplome']);
			$stmt2->bindParam(':Session_mail',$_SESSION['utilisateur']);
			
			$stmt2->execute();
			$update2->execute();
			$mail->execute($_GET['mail']);
			
			$_SESSION['utilisateur']=$_GET['mail'];
		}
		if ($_SESSION['statut']==3)
		{
			$mail=$PDO_BDD->prepare("SELECT UTI_MAIL FROM `t_user` where UTI_MAIL=?");
				$update2=$PDO_BDD->prepare("UPDATE `t_user` SET `UTI_MAIL`=:mail,`UTI_NOM`=:nom,`UTI_PRENOM`=:prenom WHERE UTI_MAIL=:Session_mail");
		
				$update2->bindParam(':mail',$_GET['mail']);
				$update2->bindParam(':nom',$_GET['nom']);
				$update2->bindParam(':prenom',$_GET['prenom']);
				$update2->bindParam(':Session_mail',$_SESSION['utilisateur']);

			$update2->execute();
			$mail->execute($_GET['mail']);
			
			$_SESSION['utilisateur']=$_GET['mail'];
		}

		header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/php/session.php');
}



