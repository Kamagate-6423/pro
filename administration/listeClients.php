<?php
	include('bdd.php');
	
	$bdd=new BDD();
	
	$reqListe='SELECT nom_cli, prenom_cli, tel_cli, email_cli, adresse_cli, date_inscription FROM clients ORDER BY date_inscription DESC';
	
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
		</tr>
	<?php	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>