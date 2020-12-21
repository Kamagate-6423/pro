
<style>
 fieldset{
	 margin-top:50px;
 }
</style>
<?php

include('bdd.php');

	function requete($categorie)
		{
			$bdd= new BDD();
			$reqSql='SELECT id_pro, image_pro, categorie, nom_pro, chemin_desti, inter_poids, prix, stock, info_pro, mot_cle, DATE_FORMAT(date_modif, "%d/%m/%Y") as date_modif FROM produits WHERE categorie=? ORDER BY id_pro';
			$reqVariable=array($categorie);
			$req = $bdd->requetes($reqSql,$reqVariable);
			
			return $req;
		}
?>

<nav class="navbar navbar-default" id="nav">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav" >
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Volailles<span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#Pchairs" style="color:black; font-weight:bold">Poulet de chair</a></li>
						<li><a href="#Mchairs" style="color:black; font-weight:bold">Morceaux de poulets</a></li>
						<li><a href="#Ppondeuses" style="color:black; font-weight:bold">Poulet pondeuse</a></li>
						<li><a href="#cokeles" style="color:black; font-weight:bold">Poulet côkélé</a></li>
						<li><a href="#Pafricains" style="color:black; font-weight:bold">Poulet africain</a></li>
						<li><a href="#pintades" style="color:black; font-weight:bold">Pintade</a></li>
						<li><a href="#canards" style="color:black; font-weight:bold">Canard</a></li>
					  </ul>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bétails <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="#boeufs" style="color:black; font-weight:bold">Viande de Bœuf</a></li>
						<li><a href="#moutons" style="color:black; font-weight:bold">Viande de Mouton</a></li>
						<li><a href="#boucs" style="color:black; font-weight:bold">Viande de Bouc</a></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a href="#poissons" class="dropdown-toggle" role="button">Poissons</a>
					</li>
					<li>
						<a href="#oeufs" class="dropdown-toggle"role="button">Oeufs </a>
					</li>
					<li>
					  <a href="#condiments" class="dropdown-toggle"role="button">Condiments </a>
					</li>
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>				

<?php /******************Caroussel********************/ ?>
<?php
	class Carrousel{
		public function fcarrousels(){
			$req=requete('carrousel');

	?>		<div class="carrousel">
				<fieldset>	<legend> Carrousel</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?php echo$donnee['image_pro'].'.jpg'?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Image</label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?> " class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="carrousel" selected>Carrousel</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description" ><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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


<?php //////////// poulet de chair


	class PouletsMorts{
		
		public function pouletsMortsChairsC(){
			$req=requete('Pchair');
?>
			<div id="Pchairs">
				<fieldset><legend>POULETS DE CHAIR ENTIERS</legend>
				<?php	 
			while($donnee=$req->fetch()){
?>
	<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div  class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"></div><span><?=$donnee['date_modif']?></span>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit  </label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Pchair" selected>Poulet de chair</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Statu</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>				</fieldset>
			</div>
			
<?php
		}
	/////////////////////////////////////// Morceux de poulets
		public function pouletsMortsChairsM(){
				$req=requete('Mchair');
?>		
			<div id="Mchairs">
				<fieldset style="margin-top:100px"><legend >DIFFERENTES PARTIES DE POULETS</legend>
				<?php	 
			while($donnee=$req->fetch()){
?>
		<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Mchair" selected></option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>	
			

<?php			
		} 
		
		////////////// pondeuses
		
		public function pouletsMortsPondeusesC(){
			$req=requete('Ppondeuse');

?>
			<div id="Ppondeuses">
				<fieldset><legend>POULETS PONDEUSES</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Ppondeuse" selected>Poulet pondeuse</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>		
<?php
		}

		/////////// Cokeles
		
		public function fcokeles(){
			$req=requete('cokele');

?>
			<div id="cokeles">
				<fieldset><legend>Côkélés</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Ppondeuse" selected>Poulet pondeuse</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>		
<?php
		}

	//// Poulets africains

		
		public function fPafricains(){
			$req=requete('Ppondeuse');

?>
			<div id="Pafricains">
				<fieldset><legend>Poulets africains</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Ppondeuse" selected>Poulet pondeuse</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>		
<?php
		}
		
		//// Pintades

		
		public function fpintades(){
			$req=requete('pintade');

?>
			<div id="pintades">
				<fieldset><legend>Pintades</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Ppondeuse" selected>Poulet pondeuse</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>		
<?php
		}


		///// Canards

		
		public function fcanards(){
			$req=requete('canard');

?>
			<div id="canards">
				<fieldset><legend>Canards</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="Ppondeuse" selected>Poulet pondeuse</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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

<?php /******************Boeuf**********************/ ?>

<?php
	class PouletsVivants{
		public function fboeufs(){
		$req=requete('boeuf');

?>
			<div id="boeufs">
				<fieldset>	<legend>Bœuf</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>"class="img-responsive"></div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="boeuf" selected>Boeuf</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
<?php
		}
		
		public function fmoutons(){
		$req=requete('mouton');

?>
			<div id="moutons">
				<fieldset>	<legend>Mouton</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="mouton" selected >Mouton</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?> class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"> <?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
<?php
	}
			$req->closeCursor();
?>
				</fieldset>
			</div>
<?php
		}
		public function fboucs(){
		$req=requete('bouc');

?>
			<div id="boucs">
				<fieldset>	<legend>Bouc</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="bouc" selected>Bouc</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description" ><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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

<?php /***********************Les oeufs*********************************/ ?>

<?php
	class Poisson{
		public function fpoissons(){

		$req=requete('poisson');
?>		
		<div class="oeufs" id="poissons">
			<fieldset>	<legend>Poissons</legend>
<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4" >
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?>" class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="poisson" selected>Poisson</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description"><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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

<?php /******************Les poussins********************/ ?>
<?php
	class Oeuf{
		public function foeufs(){
			$req=requete('oeuf');

	?>		<div class="poussins" id="oeufs">
				<fieldset>	<legend> Oeufs</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?> " class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="oeuf" selected>Oeuf</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description" ><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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


<?php /******************Condiments********************/ ?>
<?php
	class Condiment{
		public function fcondiments(){
			$req=requete('condiment');

	?>		<div class="condiment" id="condiments">
				<fieldset>	<legend> Condiments</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="produit">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
		<table>
			<tr>
				<td><label for="image1">Condiment</label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="id_pro">Identifiant du produit</label></td>
				<td><?php echo $donnee['id_pro']; ?><input type="text" id="id_pro" name="id_pro" value="<?php echo $donnee['id_pro']; ?> " class="hidden"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="condiment" selected>Condiment</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">destination</label></td>
				<td><input type="text" id="nomProduit" name="cheminDesti" value="<?php echo $donnee['chemin_desti']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle" value="<?php echo $donnee['inter_poids']; ?>"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix" value="<?php echo $donnee['prix']; ?>"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock</label></td>
				<td><input type="text" id="stock1" name="stock" value="<?php echo $donnee['stock']; ?>"/></td>
			</tr>
			<tr>
				<td><label for="description1">Information sur produit</label></td>
				<td><textarea type="text" id="description" name="description" ><?php echo $donnee['info_pro']; ?></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"><?php echo $donnee['mot_cle']; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id_pro=<?php echo $donnee['id_pro']; ?>"><input type="submit" value="Actualiser"></a></td>
			</tr>
		</table>
	</form>
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


<?php

$carrousels=new Carrousel();
	$carrousels->fcarrousels();

$pouletsMorts= new PouletsMorts();

	$pouletsMorts->pouletsMortsChairsC();
	$pouletsMorts->pouletsMortsChairsM();
	$pouletsMorts->pouletsMortsPondeusesC();
	$pouletsMorts->fcokeles();
	$pouletsMorts->fPafricains();
	$pouletsMorts->fpintades();
	$pouletsMorts->fcanards();
	
$pouletsVivants= new PouletsVivants();
	$pouletsVivants->fboeufs();
	$pouletsVivants->fmoutons();
	$pouletsVivants->fboucs();
	
$poissons= new Poisson();
	$poissons->fpoissons();

$oeufs=new Oeuf();
	$oeufs->foeufs();

$condiments=new Condiment();
	$condiments->fcondiments();
