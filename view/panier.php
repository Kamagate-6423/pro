

<?php require('header.php');

	if(!empty($_SESSION['client']['idClien'])){
	
	include('voirCommande.php');
	
}else{
 ?>

<!--fin commande-->

	<h1 style="text-align:center">Votre panier</h1>
	
	
	<span id="mesge" style="color:red; font-size:30px;"> <?php
	
	if(!empty($_SESSION['panierVide'])){
		echo $_SESSION['panierVide'];
	}

	?></span>
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
					<td><?=$donnee1['nom_pro']?><br> de <?=$donnee1['inter_poids']?></td>
					<td><input type="number" name="panier[quantite][<?=$donnee1['id_pro']?>]" value="<?=$qte=$_SESSION['panier'][$donnee1['id_pro']];?>" min="1" style="width:50px" class="inputPanier"/> 
					<?php 
						if($donnee1['id_pro']<=4){
							
							//nean
						}else{
					?>Kg
						<?php }?>
					</td>
					<td><?=$donnee1['prix']*$qte;?> fcfa</td>
					<td><a href="?idSupp=<?=$donnee1['id_pro']?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				<tr/>
			<?php  }  
			
			$req1->closecursor();
			?>
			<tr>
				<td colspan="2">TOTAL </td>
				<td></td>
				<td><strong> <?=$panier->total();?> fcfa</strong> </td>
			</tr>
			</tbody>
			<tfoot>
				<td colspan="5"><input type="submit" value="actualise" class="btn-primary actualise" style="width:100%; font-size:30px; color:yellow; display:none"></td>
			</tfoot>
		</form>
		</table>
		
		<table style="margin-top:20px" class="panier">
			<tr><td><a href='javascript:history.back()'> <button>retour</button> </a></td><td><a href="../controller/requetePanier.php?dePanier=111" class="dePanier" ><button class="btn-primary confirmePanier" ><strong class="confirmPanier">Commander</strong></button></a></td></tr>
		</table>
		
		<?php

	}
		include('footer.php') ?>