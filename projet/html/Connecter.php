


<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Page principale</title>
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="http://localhost:8080/Projet_PHP_2019_2020/projet/php/session.php">Menu</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<nav class="navbar navbar-light bg-light">
				<form class="form-inline my-2 my-lg-0">
					<button class="btn btn-outline-success " type="button" onClick="javascript:document.location.href='../php/profil.php'">Profil</button>
					<button class="btn btn-outline-success " type="button" onClick="javascript:document.location.href='inserer_offre.html'">Insérer une offre</button>
					<button class="btn btn-outline-success " type="button" onClick="javascript:document.location.href='../php/deconnexion.php'">Deconnexion</button>

				</form>
			</nav>
		  </div>
		</nav>
			
	</body>
	<body>
		<?php include '../php/offre.php'; ?>
	</body>
</html>