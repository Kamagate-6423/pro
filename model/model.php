
<?php

	/***********************Les poulets morts et leurs morceaux***********************************/
	
	
	
	
		function requete($debut,$fin)
		{
			$bdd= new BDD();
			$reqSql='SELECT id_pro, image_pro, chemin_desti, inter_poids, prix, stock, info_pro FROM produits WHERE id_pro>=? AND id_pro<=? ORDER BY id_pro';
			$reqVariable=array($debut,$fin);
			$req = $bdd->requetes($reqSql,$reqVariable);
			
			return $req;
		}

	class PouletsMorts{
		
		public function pouletsMortsChairsC(){
			$req=requete(1,4);
?>
			<div>
				<fieldset><legend>POULETS DE CHAIR ENTIERS</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a>
						</div>
						<div class="prix"><?php echo $donnee['inter_poids']; ?> <br/>l'entier à <?=$donnee['prix']?> fcfa	<br/>
						<?php if($donnee['stock']=='En Stock'){ ?>
								<a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a>
						<?php  	}else if($donnee['stock']=='Stock epuisé'){ ?>
								<a href="#" class="btn btn-primary ajoutPanierNon" style="background-color:rgb(200,0,0,0.7);">Stock épuisé</a>
						<?php   } ?>
							<br/><?php echo $donnee['stock']; ?> 
						</div>
					</div>
<?php
	}
				$req->closeCursor();
?>				</fieldset>
			</div>
			
<?php
		}
		
		public function pouletsMortsChairsM(){
				$req=requete(6,13);
?>		
			<div>
				<fieldset><legend >DIFFERENTES PARTIES DU POULETS</legend>
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> à <?=$donnee['prix']?> fcfa<br/><?php if($donnee['stock']=='En Stock'){ ?>
						<a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span class="ajoutAuPanier">Ajouter au panier</span></a>
					<?php  	}else if($donnee['stock']=='Stock epuisé'){ ?>
						<a href="#" class="btn btn-primary ajoutPanierNon" style="background-color:rgb(200,0,0,0.7);">Stock épuisé</a>
					<?php   } ?><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>	
			

<?php			
		}
		public function pouletsMortsPondeusesC(){
			$req=requete(14,15);

?>
			<div>
				<fieldset><legend>POULETS PONDEUSES CONGELES</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>		
<?php
		}

				
	}
?>

<?php /******************Les bétails**********************/ ?>

<?php
	class PouletsVivants{
		public function pouletsVivantsChairs(){
		$req=requete(16,19);

?>
			<div>
				<fieldset>	<legend>Bœuf</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php //echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
<?php
		}
		
		public function pouletsVivantsPondeuses(){
		$req=requete(20,21);

?>
			<div>
				<fieldset>	<legend>Mouton</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
<?php
		}
		public function pouletsVivantsCokeles(){
		$req=requete(22,27);

?>
			<div>
				<fieldset>	<legend>Chèvre</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
			
<?php
		}
		/*
		public function pouletsVivantsAfricains(){
		
		$req=requete(24,27);

?>
			<div>
				<fieldset>	<legend>POULETS AFRICAINS</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro'];?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span>Ajouter au panier</a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
			
<?php
		}
	*/
	}

?>

<?php /***********************Les oeufs*********************************/ ?>

<?php
	class Oeufs{
		public function oeufsPondeuses(){

		$req=requete(28,32);
?>		
		<div class="oeufs">
			<fieldset>	<legend>Poissons</legend>
<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
			</fieldset>
		</div>
<?php
		}
		/*a ANNULER
		public function oeufsAfricains(){
	
			$req=requete(30,32);

		
?>		<div class="oeufs">
			<fieldset>	<legend>Oeufs pour poulets africains</legend>
		
<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span>Ajouter au panier</a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
			</fieldset>
		</div>
<?php
		}
		*/
	}
	
?>

<?php /******************Les poussins********************/ ?>
<?php
	class Poussins{
		public function poussinsChairs(){
			$req=requete(33,35);

	?>		<div class="poussins">
				<fieldset>	<legend> POUSSINS</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele"><div class="image"><a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive"></a></div><div class="prix"><?php echo $donnee['inter_poids']; ?> <br/> 1 Kg à <?=$donnee['prix']?> fcfa<br/><a href="../controller/requetePanier.php?id=<?=$donnee['id_pro']; ?>" class="btn btn-primary ajoutPanier"><span class="glyphicon glyphicon-plus" style="color:yellow"></span><span  class="ajoutAuPanier">Ajouter au panier</span></a><br/><?php echo $donnee['stock']; ?> </div></div>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
<?php
		}
		
	}
?>