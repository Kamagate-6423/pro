<?php
	include('bdd.php');
	
	$bdd=new BDD();
	
	$reqListe='SELECT id_cli, nom_cli, prenom_cli, tel_cli, email_cli, adresse_cli, date_inscription FROM clients ORDER BY date_inscription DESC';
	
	$req=$bdd->requetes($reqListe);
 
?>

<fieldset><legend>LA LISTE DES CLIENTS INSCRITS</legend>
<table class="tableCli">
	<thead>
		<tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>EMAIL</th>
			<th>TEL</th>
			<th>ADRESSE</th>
			<th>DATE D'INSCRIPTION</th>
			<th>Supprimer</th>
		<tr/>
	</thead>
	<tbody>
	<?php while($donnee=$req->fetch()){ ?>
		<tr>
			<td><?=$donnee['nom_cli'] ?> </td>
			<td><?=$donnee['prenom_cli'] ?> </td>
			<td><?=$donnee['email_cli'] ?> </td>
			<td><?=$donnee['tel_cli'] ?> </td>
			<td><?=$donnee['adresse_cli'] ?> </td>
			<td><?=$donnee['date_inscription'] ?> </td>
		<form method="post" action="requetesSupprimer">
			<td><input type="number" name="suppCli" value="<?=$donnee['id_cli']?>" class="hidden"><button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>
		</form>
		</tr>
	<?php	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>