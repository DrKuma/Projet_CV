<?php
		require 'configBDD.inc.php';
		if (empty($_SESSION['utilisateur'])) {
	$message='Voici un message en javascript écrit par php';
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';

}
		$stmt = $PDO_BDD->prepare("SELECT UTI_PWD FROM `t_user` where UTI_MAIL=?");

				$stmt -> execute(array($_GET['login']));
				foreach($stmt as $x){
					$z=$x;
				}
				foreach($z as $y)
				{
					$mdp=$y;
				}
				$a="deuxpuissancetrois";
				$b="egalesix";
				$hash_mdp=$a.$_GET['PWD'].$b;
				$hash_mdp=sha1($hash_mdp);

				if (strcmp($hash_mdp,$mdp) == 0) {
					session_start();

					$_SESSION['utilisateur']=$_GET['login'];
					$requete=$PDO_BDD->prepare("SELECT ID_STATUT FROM `t_user` where UTI_MAIL=?");
					$requete->execute(array($_GET['login']));
					foreach($requete as $x){
					$z=$x;
				}
				foreach($z as $y)
				{
					$statut=$y;
				}
				$_SESSION['statut']=$statut;
				if($statut==1)
				{
					header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter1.php');
					exit();
				} elseif ($statut==2) {
					header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter2.php');
					exit();
				} elseif ($statut==3){
					header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/Connecter.php');
					exit();
				}
				 }	 

		

?>