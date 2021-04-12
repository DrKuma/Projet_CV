<?php
require 'ConfigBDD.inc.php';
//s print f =tester la requete
//php.net/manual
		$stmt = $PDO_BDD->prepare("INSERT INTO `t_user` (ID_USER,UTI_PWD,UTI_MAIL,UTI_NOM,UTI_PRENOM,ID_STATUT) VALUES (:id, :mdp, :mail,:nom, :prenom, :id_stat)");
	$stmt->bindParam(':id',$id);
	$stmt->bindParam(':mdp',$_GET['mdp']);
	$stmt->bindParam(':mail',$_GET['mail']);
	$stmt->bindParam(':nom',$_GET['nom']);
	$stmt->bindParam(':prenom',$_GET['prenom']);
		$stmt->bindParam(':id_stat',$id_stat);


	$query="SELECT MAX(ID_USER) as id FROM `t_user`";
	$resultat = $PDO_BDD->query($query);
	foreach($resultat as $x){
		$id=$x['id']+1;
	}
	if(!empty($_GET['entreprise'])){
		$id_stat=2;
	}
	else{
		$id_stat=1;
	}


		if ($_GET['mdp']==$_GET['conf'])
		{
			if (isset($_GET['Membre'])) 
			{
				try
			{
				$stmt->execute();
			}

			catch(Exceprion $e)
			{
				die ('Erreur :  '.$e->getMessage().'<br />');
			}
			header('Location:http://localhost:8080/Projet_PHP_2019_2020/projet/html/connexion.html');
				
			}else{
				echo "<script>alert('Ce ne sont pas les mêmes mots de passe!')</script>"; 
			}
		}
?>




</html>