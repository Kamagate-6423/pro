<?php
	include('bdd.php');
	
	$bdd=new BDD();
	
	$reqListe='SELECT id_cli, nom_cli, prenom_cli, tel_cli, email_cli, adresse_cli,date_connexion, DAYOFWEEK(date_connexion) as date_connexio, date_inscription FROM clients ORDER BY date_inscription DESC';
	
	$req=$bdd->requetes($reqListe);
 
?>

<fieldset><legend>LA LISTE DES CLIENTS INSCRITS</legend>
				<form method="get" action="adminHeader.php" class="navbar-form navbar-center">
						<div class="form-group">
						  <input type="text" name="client" class="form" placeholder="recherche de client par tel" style="width:500px; height:30px">
							<button type="submit" class="btn btn-default">OK</button>
						</div>
				</form>
<table class="tableCli">
	<thead>
		<tr>
			<th>id</th>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>EMAIL</th>
			<th>TEL</th>
			<th>ADRESSE</th>
			<th>Inscrire</th>
			<th>Connecter</th>
			<th>Supprimer</th>
		<tr/>
	</thead>
	<tbody>
	<?php while($donnee=$req->fetch()){ 
	
	
			list($date, $time) = explode(" ", $donnee['date_inscription']);
			list($year, $month, $day) = explode("-", $date);
			list($hour, $min, $sec) = explode(":", $time);
			
			
			list($date1, $time1) = explode(" ", $donnee['date_connexion']);
			list($year1, $month1, $day1) = explode("-", $date1);
			list($hour1, $min1, $sec1) = explode(":", $time1);
			 
	?>
		<tr>
			<td><?=$donnee['id_cli'] ?> </td>
			<td><?=$donnee['nom_cli'] ?> </td>
			<td><?=$donnee['prenom_cli'] ?> </td>
			<td><?=$donnee['email_cli'] ?> </td>
			<td><?=$donnee['tel_cli'] ?> </td>
			<td><?=$donnee['adresse_cli'] ?> </td>
			<td><?=$donnee['date_inscription'] = "$day/$month/$year $hour:$min";?> </td>
			<td><?=$donnee['date_connexion'] = $jour[$donnee['date_connexio']]." $day1/$month1/$year1 $hour1:$min1";?></td>
		<form method="post" action="requetesSupprimer">
			<td><input type="number" name="suppCli" value="<?=$donnee['id_cli']?>" class="hidden">
			<input type="text" name="nom" value="<?=$donnee['nom_cli']?>" class="hidden" >
			<input type="text" name="prenom" value="<?=$donnee['id_cli']?>" class="hidden">
			<button type="submit" class="btn-danger" ><span class="glyphicon glyphicon-trash"></span></button></td>
		</form>
		</tr>
	<?php	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>