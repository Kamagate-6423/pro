<?php
	include('bdd.php');
	
	$bdd=new BDD();
	
	$reqListe='SELECT cli.id_cli id_cli,
				cli.nom_cli nom,
				cli.prenom_cli prenom,
				cli.tel_cli tel,
				com.id_com id_com,
				com.id_cli comIdCli,
				com.qtes_pro qtes,
				com.prix_total prixTotal,
				com.date_liv,
				com.date_valid dateV
				FROM commandes AS com, clients AS cli 
				WHERE com.id_cli = cli.id_cli 
				ORDER BY com.date_liv DESC';
	
	$req=$bdd->requetes($reqListe);
	
	//var_dump($donnee=$req->fetch());
?>

<fieldset><legend>LA LISTE DES COMMANDES</legend>
<table class="tableCom">
	<thead>
		<tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>TEL</th>
			<th>QUANTITES</th>
			<th>SOMMES</th>
			<th>Date de validation</th>
			<th>VOIR FACTURE</th>
			<th>Supprimer</th>
		<tr/>
	</thead>
	<tbody>
	<?php while($donnee=$req->fetch()){ 
	
	$pQte=explode(',',$donnee['qtes']);
	
	list($date, $time) = explode(" ", $donnee['dateV']);
			list($year, $month, $day) = explode("-", $date);
			list($hour, $min, $sec) = explode(":", $time);
			
	?>
	
	
		<tr>
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td><input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
			<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
			<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
			<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>
		</form>
		</tr>
	<?php	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>