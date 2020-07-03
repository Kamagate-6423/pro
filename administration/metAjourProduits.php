
<style>
 fieldset{
	 margin-top:50px;
 }
</style>
<?php

include('bdd.php');

	function requete($debut,$fin)
		{
			$bdd= new BDD();
			$reqSql='SELECT id_pro, image_pro, nom_pro, chemin_desti, inter_poids, prix, stock, info_pro, date_modif FROM produits WHERE id_pro>=? AND id_pro<=? ORDER BY id_pro';
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
	<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"></div><span><?=$donnee['date_modif']?></span>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">chemin du desti</label></td>
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
		
		public function pouletsMortsChairsM(){
				$req=requete(6,13);
?>		
			<div>
				<fieldset style="margin-top:100px"><legend >DIFFERENTES PARTIES DE POULETS</legend>
				<?php	 
			while($donnee=$req->fetch()){
?>
		<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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
		public function pouletsMortsPondeusesC(){
			$req=requete(14,15);

?>
			<div>
				<fieldset><legend>POULETS PONDEUSES</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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

<?php /******************Les Poulets Vivants**********************/ ?>

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
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>"class="img-responsive"></div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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
		
		public function pouletsVivantsPondeuses(){
		$req=requete(20,21);

?>
			<div>
				<fieldset>	<legend>Mouton</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?> class="hidden""/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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
		public function pouletsVivantsCokeles(){
		$req=requete(22,27);

?>
			<div>
				<fieldset>	<legend>Chèvre</legend>
		
				<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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
	class Oeufs{
		public function oeufsPondeuses(){

		$req=requete(28,32);
?>		
		<div class="oeufs">
			<fieldset>	<legend>Poissons</legend>
<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4" >
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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
	class Poussins{
		public function poussinsChairs(){
			$req=requete(33,35);

	?>		<div class="poussins">
				<fieldset>	<legend> POUSSINS</legend>
					<?php	 
			while($donnee=$req->fetch()){
?>
					<form method="post" action="requeteMetAjourProduits.php?id_pro=<?php echo $donnee['id_pro']; ?>" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div style="height:200px; border:1px solid black; max-width:300px">  <img src="../public/image/<?=$donnee['image_pro']?>" class="img-responsive"> </div>
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
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="<?php echo $donnee['nom_pro']; ?>"/></td>
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
				<td><textarea type="text" id="description" name="description" value="<?php echo $donnee['info_pro']; ?>"></textarea></td>
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

$pouletsMorts= new PouletsMorts();

	$pouletsMorts->pouletsMortsChairsC();
	$pouletsMorts->pouletsMortsChairsM();
	$pouletsMorts->pouletsMortsPondeusesC();
	
$pouletsVivants= new PouletsVivants();
	$pouletsVivants->pouletsVivantsChairs();
	$pouletsVivants->pouletsVivantsPondeuses();
	$pouletsVivants->pouletsVivantsCokeles();
	
$oeufs= new Oeufs();
	$oeufs->oeufsPondeuses();

$poussins=new Poussins();
	$poussins->poussinsChairs();
?>