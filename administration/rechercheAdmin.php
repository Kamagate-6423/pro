

<?php
	include('bdd.php');
	
	$bdd=new BDD();
	
	//Pour rechercher une commande
if(isset($_GET['commande'])){
	
	$expression="%".$_GET['commande']."%";
	
	$reqListe='SELECT cli.id_cli id_cli,
				cli.nom_cli nom,
				cli.prenom_cli prenom,
				cli.tel_cli tel,
				com.id_com id_com,
				com.id_cli comIdCli,
				com.qtes_pro qtes,
				com.prix_total prixTotal,
				com.date_liv dateL,
				DAYOFWEEK(com.date_liv) dateJ,
				com.heure_liv heureLiv,
				com.date_valid dateV
				FROM commandes AS com, clients AS cli 
				WHERE cli.tel_cli LIKE ? AND com.id_cli = cli.id_cli 
				ORDER BY com.date_liv DESC';
				
	$reqVariable=array($expression);
	$req=$bdd->requetes($reqListe, $reqVariable);
	
	//var_dump($donnee=$req->fetch());
?>

<fieldset><legend>LA LISTE DES COMMANDES</legend>
				<form method="get" action="adminHeader.php" class="form">
						<div class="form-group">
						  <input type="text" name="commande" class="form" placeholder="Search" style="width:500px; height:30px">
							<button type="submit" class="btn btn-default">OK</button>
						</div>
				</form>
<table class="tableCom">
	<thead>
		<tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>TEL</th>
			<th>QUANTITES</th>
			<th>SOMMES</th>
			<th>Date validation</th>
			<th>Date livraison</th>
			<th>FACTURE</th>
			<th>Supprimer</th>
		<tr/>
	</thead>
	<tbody>
	<?php while($donnee=$req->fetch()){ 
	
	$pQte=explode(',',$donnee['qtes']);
	
	list($date, $time) = explode(" ", $donnee['dateV']);
			list($year, $month, $day) = explode("-", $date);
			list($hour, $min, $sec) = explode(":", $time);
	
	list($date1) = explode(" ", $donnee['dateL']);
			list($year1, $month1, $day1) = explode("-", $date1);
	
	list($time1) = explode(" ", $donnee['heureLiv']);
			list($hour1, $min1, $sec1) = explode(":", $time1);
			
	?>
	
	
		<tr>
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year $hour:$min";?> </td>
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
<?php
	// pour rechercher un client
	}elseif(isset($_GET['client'])){
	
	$expression="%".$_GET['client']."%";
	
	$reqListe='SELECT id_cli, nom_cli, prenom_cli, tel_cli, email_cli, adresse_cli,date_connexion, DAYOFWEEK(date_connexion) as date_connexio, date_inscription FROM clients WHERE tel_cli LIKE ?';
	
	$reqVariable=array($expression);
	$req=$bdd->requetes($reqListe,$reqVariable);
	
 
?>

<fieldset><legend>LA LISTE DES CLIENTS INSCRITS</legend>
				<form method="get" action="adminHeader.php" class="form">
						<div class="form-group">
						  <input type="text" name="client" class="form" placeholder="Search" style="width:500px; height:30px">
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
			
			setlocale(LC_TIME, 'fr_FR.utf8','fra');
			 
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
<?php
	}	
?>