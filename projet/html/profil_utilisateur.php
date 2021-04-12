
<?php
require '../php/configBDD.inc.php';
	// $filtre=(isset($_REQUEST['filtre'])?$_REQUEST['filtre']:"");
	$ResultFiltre=$PDO_BDD->query('SELECT UTI_MAIL,UTI_NOM,UTI_PRENOM,ID_USER FROM `t_user` where `ID_STATUT` != 3');
foreach ($ResultFiltre as $p)
{
?>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>
	<form action="../php/modif_utilisateur.php" method="get" onSubmit="return validation(this)">
		<div class="card">
			<div class="form-group">
				<h5><?php echo $p['UTI_MAIL']; ?></h5>
			</div>
			<div class="form-group">
				<p><?php echo $p['UTI_NOM']; ?></p>
			</div>
			<div class="form-group">
				<p><?php echo $p['UTI_PRENOM']; ?></p>
			</div>
				<input type="text" name="id" value='<?php echo $p['ID_USER']; ?>' readonly="true">
				<button type="submit" class="btn btn-success">supprimer</button>
		</div>
	</form>
</body>	
		

<?php } ?>
<button type="button" class="btn btn-primary" value="Retour" onClick="javascript:document.location.href='../php/session.php'">Retour</button>
