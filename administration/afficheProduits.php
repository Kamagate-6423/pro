

<?php

////////        essaiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii           ///////////////

 include('bdd.php');

	function afficheProduits($debut,$fin){
		$reqSql='SELECT image_id, image, intervalle, poids_prix, stock, descrip FROM essai WHERE image_id>=? AND image_id<? ORDER BY image_id';
		$reqVariable=array($debut,$fin);
	
		$bdd= new BDD();
		$req = $bdd->requetes($reqSql,$reqVariable);
	
?>
		<div><a href="panier.php">Panier</a></div>
		<div class="pouletMortChair">
			<fieldset><legend>POULET DE CHAIR</legend>
				<div>
<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="#"><img src="../image/<?php echo $donnee['image']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['intervalle']; ?> <br/> 1 Kg à <?=$donnee['poids_prix']?> fcfa<br/><a href="panier.php?id=<?=$donnee['image_id']; ?>">Ajouter au panier</a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>				</div>
			</fieldset>
		</div>
<?php
}
	afficheProduits(1,5);
?>