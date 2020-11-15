
<?php //"MATCH (title,body)  AGAINST ('database' IN BOOLEAN MODE)
//AS score FROM articles ORDER BY score DESC;"
		
		$expression=verifierDonne($_GET['recherche']);
	function requeteRecherche(){	
			$expression=verifierDonne($_GET['recherche']);
			$expression="%".$expression."%";
			$bdd= new BDD();
			$reqSql='SELECT id_pro, image_pro, nom_pro, chemin_desti, inter_poids, prix, stock, info_pro, mot_cle FROM produits WHERE nom_pro LIKE ? || info_pro LIKE ? || mot_cle LIKE ?';
			$reqVariable=array($expression, $expression, $expression);
			$req = $bdd->requetes($reqSql,$reqVariable);
			
			return $req;
		}
		
	if(requeteRecherche()->fetch()){	
		function pouletsChairsC(){
			$req=requeteRecherche();
			$expression=verifierDonne($_GET['recherche']);
?>
			<div>
				<fieldset><legend>Résultats de recherche pour: <?php echo "<span style='color:blue'>".$expression."</span>"?></legend>
				<?php	 
				while($donnee=$req->fetch()){
?>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 PCongele">
						<div class="image">
							<a href="../view/voirProduit.php?id_pro=<?=$donnee['id_pro'];?>"><img src="../public/image/	<?php echo $donnee['image_pro']; ?>" alt="" class="img-responsive">
							</a>
						</div>
						<div class="prix"><?=$donnee['nom_pro']." de "?><?php echo $donnee['inter_poids']." "; ?>l'entier à <?=$donnee['prix']?> fcfa	<br/>
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
<?php 	}
		pouletsChairsC();
	}else{
?>		<fieldset><legend>Pas de résultats de recherche pour: <?php echo "<span style='color:red'>".$expression."</span>"?>		</legend>
<?php
	}
?>