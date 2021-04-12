<?php
session_start();
require 'configBDD.inc.php';


				if($_SESSION['statut']==1)
				{
					$requete=$PDO_BDD->prepare("SELECT * FROM `t_membre` where ID_USER=(SELECT ID_USER FROM `t_user` where UTI_MAIL=?)");
					$requete2=$PDO_BDD->prepare("SELECT * FROM `t_user` where UTI_MAIL=?");
						$requete->execute(array($_SESSION['utilisateur']));
						$requete2->execute(array($_SESSION['utilisateur']));
						foreach ($requete2 as $p)
						{
							?>
								  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<div class="form-group">
							<label for="nom">Nom :</label>
								<h5><?php echo $p['UTI_NOM']; ?></h5>
						</div>
						<div class="form-group">
							<label for="prenom">Prenom :</label>
								<h5><?php echo $p['UTI_PRENOM']; ?></h5>
						</div>
						<div class="form-group">
							<label for="mail">Mail :</label>
								<h5><?php echo $p['UTI_MAIL']; ?></h5>
						</div>
<?php } ?><?php
						foreach ($requete as $p)
						{
							?>
						<div class="form-group">


							
							<label for="nom">Date de naissance :</label>
								<h5><?php echo $p['DATE_NAIS']; ?></h5>
							<label for="tel">Telephone :</label>
								<h5><?php echo $p['TEL']; ?></h5>
							<label for="nom">Diplome préparer :</label>
								<h5><?php echo $p['DIPLOME_PREP']; ?></h5>

						</div>
						<button type="button" class="btn btn-primary" value="Modifier" onClick="javascript:document.location.href='../html/modif_profil_membre.php'">Modifier</button>
						<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Retour</button>
<?php } ?>
<?php

				} elseif ($_SESSION['statut']==2) {
					$requete=$PDO_BDD->prepare("SELECT * FROM `t_entreprise` where ID_USER=(SELECT ID_USER FROM `t_user` where UTI_MAIL=?)");
					$requete2=$PDO_BDD->prepare("SELECT * FROM `t_user` where UTI_MAIL=?");
						$requete->execute(array($_SESSION['utilisateur']));
						$requete2->execute(array($_SESSION['utilisateur']));
						foreach ($requete2 as $p)
						{
							?>
								  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<div class="form-group">
							<label for="nom">Nom :</label>
								<h5><?php echo $p['UTI_NOM']; ?></h5>
						</div>
						<div class="form-group">
							<label for="nom">Prenom :</label>
								<h5><?php echo $p['UTI_PRENOM']; ?></h5>
						</div>
						<div class="form-group">
							<label for="nom">Mail :</label>
								<h5><?php echo $p['UTI_MAIL']; ?></h5>
						</div>
<?php } ?><?php
						foreach ($requete as $p)
						{
							?>
						<div class="form-group">


							<label for="nom">Telephone :</label>
								<h5><?php echo $p['TEL']; ?></h5>
							<label for="nom">Raison Sociale :</label>
								<h5><?php echo $p['RAISON_SOCIALE']; ?></h5>

						</div>
						<button type="button" class="btn btn-primary" value="Modifier" onClick="javascript:document.location.href='../html/modif_profil_entreprise.php'">Modifier</button>
						<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Retour</button>
<?php } ?>
<?php

				} elseif ($_SESSION['statut']==3) {
					$requete2=$PDO_BDD->prepare("SELECT * FROM `t_user` where UTI_MAIL=?");

						$requete2->execute(array($_SESSION['utilisateur']));
						foreach ($requete2 as $p)
						{
							?>
								  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
						<div class="form-body">
							<label for="nom">Nom :</label>
								<h5><?php echo $p['UTI_NOM']; ?></h5>
						</div>
						<div class="form-body">
							<label for="nom">Prenom :</label>
								<h5><?php echo $p['UTI_PRENOM']; ?></h5>
						</div>
						<div class="form-body">
							<label for="nom">Mail :</label>
								<h5><?php echo $p['UTI_MAIL']; ?></h5>
						</div>
						<button type="button" class="btn btn-primary" value="Modifier" onClick="javascript:document.location.href='../html/modif_profil_admin.php'">Modifier</button>
						<button type="button" class="btn btn-primary" value="Modifier" onClick="javascript:document.location.href='../html/profil_utilisateur.php'">Profil utilisateur</button>
						<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Retour</button>
<?php } ?>
<?php
				}
		
		