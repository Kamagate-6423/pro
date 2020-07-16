<?php
 
if(isset($_POST['changePasse'])){
	include('bdd.php');
	$bdd=new BDD();
?>
	<fieldset><legend>Modifie le mot de passe</legend>
		<form method="post" action="adminHeader.php" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
			<table>
				<tr>
					<td><label for="identifiant">Identifiant</label></td>
					<td><input type="number" id="identifiant" name="identifiant" required></td>
				</tr>
				<tr>
					<td><label for="passePrenom">Prenom</label></td>
					<td><input type="text" id="passePrenom" name="passePrenom" required></td>
				</tr>
				<tr style="margin-bottom:5px">
					<td><label for="passeTel">Tel</label></td>
					<td><input type="tel" id="passeTel" name="passeTel" required /></td>
				</tr>

				<tr style="margin-bottom:5px">
					<td><label for="passe">passe</label></td>
					<td><input type="text" id="passe" name="passe" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><a href="?id=1"><input type="submit" value="Soumettre le passe"></a></td>
				</tr>
			</table>
		</form>
	</fieldset>

<?php	
}else if(isset($_POST['identifiant']) && isset($_POST['passe']) && isset($_POST['passeTel'])){
	include('bdd.php');
	$bdd=new BDD();

	
	$id=verifierDonne($_POST['identifiant']);
	$prenom=verifierDonne($_POST['passePrenom']);
	$tel=verifierDonne($_POST['passeTel']);
	$passe=verifierDonne($_POST['passe']);
	
	
	$reqPassN='UPDATE clients SET
					pass_cli = :passe
					WHERE id_cli=:id AND tel_cli=:tel AND prenom_cli=:prenom';
					
	$varPassN= array(
			'passe' =>$passe,
			'prenom' =>$prenom,
			'tel' =>$tel,
			'id'=>$id
			);
			
	$bdd->requetes($reqPassN, $varPassN);
	
	
	$_SESSION['adminAlert']="Le mot de passe du client ".$prenom." a été modifier à: ".$passe;
	
		header("location:adminHeader.php");
		
}else{include('bdd.php');
	$bdd=new BDD();
	$reqListe='SELECT id, nom, prenom, tel, date_message FROM passes ORDER BY date_message DESC';
	
	$req=$bdd->requetes($reqListe);
	

?>	
	<fieldset><legend>Demende de modification de mot de passe</legend>
<table class="tableCli">
	<thead>
		<tr>
			<th>NOM</th>
			<th>PRENOM</th>
			<th>TEL</th>
			<th>DATE</th>
			<th>Modifier</th>
		<tr/>
	</thead>
	<tbody>
	<?php while($donnee=$req->fetch()){ 
	
	$jour = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
$mois = Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", 
        "septembre", "octobre", "novembre", "décembre");
			list($date, $time) = explode(" ", $donnee['date_message']);
			list($year, $month, $day) = explode("-", $date);
			list($hour, $min, $sec) = explode(":", $time);
			
	
	?>
		<tr>
			<td><?=$donnee['nom'] ?> </td>
			<td><?=$donnee['prenom'] ?> </td>
			<td><?=$donnee['tel'] ?> </td>
			<td><?=$donnee['date_message'] = "$day/$month/$year $hour:$min";//$donnee['date_inscription'] ?> </td>
		<form method="post" action="adminHeader.php">
			<td><input type="number" name="changePasse" value="<?=$donnee['id']?>" class="hidden"><button type="submit" class="btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
		</form>
		</tr>
	<?php	} 	
	$req->closeCursor();
	?>
	</tbody>
</table>
</fieldset>
<?php }?>