
<?php
require 'configBDD.inc.php';

	$ResultFiltre=$PDO_BDD->query('SELECT * FROM `t_offre`');
foreach ($ResultFiltre as $p)
{
?>
<div>
	<div class="card">
		<div class="card-body">
			<h5 style="font-weight: bold;"><?php echo $p['TITRE']; ?></h5>
			<p><?php echo $p['MISSION']; ?></p>
			<p><?php echo $p['DATE_DEBUT']; ?></p>
			<button class="btn btn-success"><img src="../image/pouce.png"></button>
			<h6><?php echo "contact : " . $p['CONTACT']; ?></h6>
			
		</div>
		
	</div>
</div>
<?php } ?>