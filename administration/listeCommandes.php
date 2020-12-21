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
				com.date_liv dateL,
				DAYOFWEEK(com.date_liv) dateJ,
				com.heure_liv heureLiv,
				com.date_valid dateV
				FROM commandes AS com, clients AS cli 
				WHERE com.id_cli = cli.id_cli 
				ORDER BY com.date_liv DESC';
	
	$req=$bdd->requetes($reqListe);
	
	//var_dump($donnee=$req->fetch());
?>

<fieldset><legend>LA LISTE DES COMMANDES</legend>
				<form method="get" action="adminHeader.php" class="navbar-form navbar-center">
						<div class="form-group">
						  <input type="text" name="commande" class="form" placeholder="recherche de commande par tel" style="width:500px; height:30px">
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
	<?php
			$dateL=strtotime($date1)+$hour1*60*60+$min1*60+$sec1;
			$dateDiff=$dateL-(time()+3600);
?>
<?php	
	if($dateDiff<0){
		
	?>
		<tr style="background-color:green">
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
<?php
	}else if($dateDiff<1800){
	?>
		<tr style="background-color:red">
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
<?php
	}else if($dateDiff<3600){
	?>
		<tr style="background-color:orange">
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
<?php
	}else if($dateDiff<5400){
	?>
		<tr style="background-color:yellow">
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
<?php
	}else if($dateDiff<7200){
	?>
		<tr style="background-color:blue">
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour:$min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
<?php
	}else{
?>
	
	
	
		<tr>
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=array_sum($pQte) ?> Kg</td>
			<td><?=$donnee['prixTotal'] ?> fcfa</td>
			<td><?=$donnee['dateV']="$day/$month/$year $hour $min"?></td>
			<td><?=$donnee['dateL']=$jour[$donnee['dateJ']]." $day1/$month1/$year1 $hour1:$min1";?> </td>
			<td><a href="facture.php?id_com=<?=$donnee['id_com']?>">Afficher</a> </td>
		<form method="post" action="requetesSupprimer.php">
			<td>
				<input type="number" name="suppCom" value="<?=$donnee['id_com']?>" class="hidden">
				<input type="text" name="nom" value="<?=$donnee['nom']?>" class="hidden" >
				<input type="text" name="prenom" value="<?=$donnee['prenom']?>" class="hidden">
				<button type="submit" class="btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
		</form>
		</tr>
	<?php	}	
	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>
