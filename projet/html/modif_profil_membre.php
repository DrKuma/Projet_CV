<?php
session_start();
require '../php/configBDD.inc.php';
	$requete=$PDO_BDD->prepare("SELECT * FROM `t_user` where UTI_MAIL=?");
	$requete->execute(array($_SESSION['utilisateur']));
		$requete2=$PDO_BDD->prepare("SELECT * FROM `t_membre` where ID_USER=(SELECT ID_USER FROM `t_user` where UTI_MAIL=?)");
		$requete2->execute(array($_SESSION['utilisateur']));
		foreach ($requete as $x)
		{
			$p=$x;
		}
		foreach ($requete2 as $x)
		{
			$p2=$x;
		}
?>



<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Modification Entreprise</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<form action="../php/modif_profil.php" method="get" onSubmit="return validation(this)">
		  <div class="form-group">
			<label for="nom">Nom :</label>
			<input type="text" class="form-control" name="nom"  value=<?php echo $p['UTI_NOM']; ?> >
		  </div>
		  <div class="form-group">
			<label for="prenom">Prénom :</label>
			<input type="text" class="form-control" name="prenom"  value=<?php echo $p['UTI_PRENOM']; ?> >
		  </div>
		  <div class="form-group">
			<label for="tel_membre">Téléphone :</label>
			<input type="tel" class="form-control" name="tel_membre" pattern="[0][0-9]-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" value=<?php echo $p2['TEL']; ?> >
		  </div>
		  <div class="form-group">
			<label for="rs_sociale">date de naissance :</label>
			<input type="text" class="form-control" name="date_nais"  value=<?php echo $p2['DATE_NAIS']; ?> >
		  </div>
		  <div class="form-group">
			<label for="mail">Adresse mail :</label>
			<input type="email" class="form-control" name="mail"  value=<?php echo $p['UTI_MAIL']; ?> >
		  </div>
		   <div class="form-group">
			<label for="mail">Diplome :</label>
			<input type="text" class="form-control" name="Diplome"  value=<?php echo $p2['DIPLOME_PREP']; ?> >
		  </div>
		  </div>
		  <button type="submit" class="btn btn-primary" >Modifier</button>
		  
		</form>
	</body>
<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Annuler</button>
</html>