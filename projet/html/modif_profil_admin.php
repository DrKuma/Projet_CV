<?php
session_start();
require '../php/configBDD.inc.php';
	$requete=$PDO_BDD->prepare("SELECT * FROM `t_user` where UTI_MAIL=?");
	$requete->execute(array($_SESSION['utilisateur']));
		foreach ($requete as $x)
		{
			$p=$x;
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
			<label for="mail">Adresse mail :</label>
			<input type="email" class="form-control" name="mail"  value=<?php echo $p['UTI_MAIL']; ?> >
		  </div>
		  </div>
		  <button type="submit" class="btn btn-primary" >Modifier</button>
		  
		</form>
	</body>
<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Annuler</button>
</html>