
	<div class="container-fluid">
		<section class="container-fluid">
		 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->

			<div class="carousel-inner" role="listbox">
<?php
				$reqAc1=requete(1,3);
				while($donneeAc1=$reqAc1->fetch()){
?>
			  
				<div class="item <?=$donneeAc1['stock']?>">
					<a href="<?=$donneeAc1['chemin_desti']?>">
						<img src="../public/image/<?=$donneeAc1['image_pro']?>" class="img-responsive" alt="...">
						<div class="carousel-caption">
						<?=$donneeAc1['info_pro']?>
						</div>
					</a>
				</div>
<?php				} ?>
			</div>
			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div> <!--fin carousel-->
			</div>
			<div class="hidden-xs col-sm-6 col-md-6 col-lg-6 pouletPret hidden"><!--cette partie est annulee avec bootstrap-->
				<div>
					<a href="#">
						<div class="col-sm-8 col-md-8 col-lg-8"><h4>POULET AU FOUR</h4><p>Trouver des restaurants de preference, plus proche de chez vous </p> </div>
						<div class="col-sm-4 col-md-4col-lg-4"><img src="../public/image/cuire1.jpg" class="img-responsive"> </div>
					</a>
				</div>
				<div>
					<a href="#">
						<div class="col-sm-8 col-md-8 col-lg-8"> <h4>PRÊT A CUIRE</h4><p>Trouver des points de vente de preference, plus proche de chez vous </p> </div>
						<div class="col-sm-4 col-md-4col-lg-4"><img src="../public/image/pcuire.jpg" class="img-responsive"> </div>
					</a>
				</div>
				<div>
					<a href="">
						<div class="col-sm-8 col-md-8 col-lg-8"> <h4>OEUFS</h4><p>Trouver des points de vente d'oeufs, plus proche de chez vous </p> </div>
						<div class="col-sm-4 col-md-4col-lg-4"><img src="../public/image/oeuf2.jpg" class="img-responsive"> </div>
					</a>
				</div>
			</div>
			<!--Enfffffinn-->
		</section>
		<section class="section">
<?php	
		
		$reqAc2=requete(4,12);
		while($donneeAc2=$reqAc2->fetch()){
?>
		
			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 differentsProduits">
				<a href="../index/index.php?section=congeletC">
					<div class="produit"><img src="../public/image/<?=$donneeAc2['image_pro']?>" class="img-responsive" alt="Poulets prêt à cuire"></div>
					<div class="description"><p><?=$donneeAc2['info_pro']?> </p></div>
					<div class="plusDeDetails">Voir plus</div>
				</a>
			</div>
<?php
		}
?>
		</section>
	</div>