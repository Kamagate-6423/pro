<?php 
session_start();


if(isset($_SESSION['connexion'])){ // Verifier si le client s'est connecté avant de faire une commande
	
require('header.php') ;



?>

		
<div  class="form1" style="height:auto">
	<div class="nb">
		<dl><dt>NB:</dt>
			<dd>Le paiement se fait seulement à la livraison</dd>
			<dd>Une fois confirmer vous allez recevoir un appel téléphonique dans 15 min</dd>
		</dl>
	</div>
	<span class="mesgeVal"></span>
	<span id="mesge" style="color:blue; font-size:20px;" > <?php
	
	if(!empty($_SESSION['commander'])){
		echo "<div style=' background-color:rgb(0,200,0,0.4); text-align:center; border-radius:30px' class='alert alert-success' role='alert'>".$_SESSION['commander']."<br/><a href='../controller/detruireSession.php?ok=detruire' style='background-color:green; color:#FFF'>OK</a></div>";
	}

	?></span>
	<div class="form" style="height:auto">
		<form method="post" action="../controller/requeteCommander.php" class="comVal">
			<fieldset><legend>Remplir ce pour valider votre commande</legend>
				<table>
					<tr><td> <label for="lieux">Lieux de livraison</label> </td><td><textarea type="textarea" id="lieux" name="lieuxL"  required><?php if(isset($_SESSION['client']['adresseCli'])){ echo $_SESSION['client']['adresseCli'];}?></textarea></td></tr>
					<tr><td> <label for="date">Date de livraison</label> </td><td><input type="date" id="date" name="dateL" placeholder="" required></td></tr>
					<tr><td> <label for="heure">Heure de livraison</label> </td><td><input type="time" id="heure" name="heureL" placeholder="" required></td></tr>
					
				</table>
				<table style="margin-top:20px; width:100%;">
				<tr><td><a href='javascript:history.back()' class="btn btn-primary">retour </a></td><td><a href="" ><input type="submit" value="Valider la commander" class="btn-primary"></a></td></tr>
				</table>
			</fieldset>	
		</form>
	</div>
</div>

<h1 style="text-align:center">Votre panier</h1>
		<table class="panier">
			<thead>
				<th> IMAGE</th>
				<th> NOM</th>
				<th> QUANTITES</th>
				<th> MONTANTS</th>
			</thead>
		<form method="post" action="panier.php">
			<tbody>
			<?php 
			
			unset($_SESSION['panier']['']);
			
			$ids=array_keys($_SESSION['panier']);
			
			$req1=$bdd->requetes('SELECT id_pro, image_pro, nom_pro, prix, inter_poids FROM produits WHERE id_pro IN ('.implode(',',$ids).')');
			
			while($donnee1=$req1->fetch()){ ?>
				<tr>
					<td><img src="../public/image/<?=$donnee1['image_pro']?>" alt="" style="width:100px"></td>
					<td><?=$donnee1['nom_pro']?><br> <?=$donnee1['inter_poids']?></td>
					<td><?=$qte=$_SESSION['panier'][$donnee1['id_pro']];?> Kg
						<input type="number" name="panier[quantite][<?=$donnee1['id_pro']?>]" value="<?=$qte=$_SESSION['panier'][$donnee1['id_pro']];?>" style="width:50px" class="hidden" /> </td>
					<td><?=$donnee1['prix']*$qte;?> fcfa</td>
					<td class="hidden"><a href="?idSupp=<?=$donnee1['id_pro']?>">Sup</a></td>
				<tr/>
			<?php  }  
			
			$req1->closecursor();
			?>
			</tbody>
			<tfoot>
				<td colspan="2">TOTAL </td>
				<td></td>
				<td><strong> <?=$panier->total();?> fcfa</strong> </td>
			</tfoot>
		</form>
		</table>
	
	
<?php 
}else{
	
	$_SESSION['connexionEchouer']="Connectez vous avant de faire passer une commande, sinon inscrivez-vous";
	$_SESSION['inscription']="";
	
	header('location:client.php');
}


include('footer.php') ?>