

<?php

	/***********************Les poulets morts et leurs morceaux***********************************/
	
	
	
	
		function requete($categorie)
		{
			$bdd= new BDD();
			$reqSql='SELECT id_pro, image_pro, categorie, nom_pro, chemin_desti, inter_poids, prix, stock, info_pro FROM produits WHERE categorie=? ORDER BY id_pro';
			$reqVariable=array($categorie);
			$req = $bdd->requetes($reqSql,$reqVariable);
			
			return $req;
		}

	class PouletsMorts{
		
		public function pouletsChairsC(){
			$req=requete('Pchair');
?>
			<div>
				<fieldset><legend>POULETS DE CHAIR ENTIERS</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> l'entier <?=$donnee['prix']?> fcfa<br/>
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
		
		public function pouletsChairsM(){
				$req=requete('Mchair');
?>		
			<div>
				<fieldset><legend >DIFFERENTES PARTIES DU POULETS</legend>
				<?php	 
			while($donnee=$req->fetch()){
?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
?>
				</fieldset>
			</div>	
			

<?php			
		}
		public function pouletsPondeuses(){
			$req=requete('Ppondeuse');

?>
			<div>
				<fieldset><legend>POULETS PONDEUSES CONGELES</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
?>
				</fieldset>
			</div>		
<?php
		}
		
		public function cokeles(){
			$req=requete('cokele');
?>
			<div>
				<fieldset><legend>Côkélés</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
	
	public function pafricains(){
			$req=requete('Pafricain');
?>
			<div>
				<fieldset><legend>POulets africains</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
	
	public function pintades(){
			$req=requete('pintade');
?>
			<div>
				<fieldset><legend>Pintades</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
	
	public function canards(){
			$req=requete('canard');
?>
			<div>
				<fieldset><legend>Canards</legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
	
	}
?>

<?php /******************Les bétails**********************/ ?>

<?php
	class PouletsVivants{
		public function boeuf(){
		$req=requete('boeuf');

?>
			<div>
				<fieldset>	<legend>Bœuf</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
				<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
?>
				</fieldset>
			</div>
<?php
		}
		
		public function mouton(){
		$req=requete('mouton');

?>
			<div>
				<fieldset>	<legend>Mouton</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
?>
				</fieldset>
			</div>
<?php
		}
		public function bouc(){
		$req=requete('bouc');

?>
			<div>
				<fieldset>	<legend>Bouc</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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

<?php /***********************Les Poissons*********************************/ ?>

<?php
	class Oeufs{
		public function poissons(){

		$req=requete('poisson');
?>		
		<div class="oeufs">
			<fieldset>	<legend>Poissons</legend>
<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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

<?php /******************Les oeufs********************/ ?>
<?php
	class Poussins{
		public function oeufs(){
			$req=requete('oeuf');

	?>		<div class="poussins">
				<fieldset>	<legend> Oeufs</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa le carton<br/>
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
?>
				</fieldset>
			</div>
<?php
		}
		
	}
?>


<?php    //*************** Condiments                             ?>
<?php
	class Condiments{
		public function fcondiments(){
			$req=requete('condiment');

	?>		<div class="condiment">
				<fieldset>	<legend>Les condiments</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." "?><?php echo $donnee['inter_poids']." "; ?> à <?=$donnee['prix']?> fcfa<br/>
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
?>
				</fieldset>
			</div>
<?php
		}
		
	}
?>