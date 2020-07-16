

<?php require('header.php');

 $idCli="";
 
	if(isset($_SESSION['client']['idClien'])){
		$idCli=$_SESSION['client']['idClien'];
	}

// Commande existante du client
	$reqInfo='SELECT id_cli
				FROM commandes WHERE id_cli = ?';
	
	$variableInfo=array($idCli);
	
	$req=$bdd->requetes($reqInfo,$variableInfo);
	$siComExiste=$req->fetch();
	
	if(!empty($_SESSION['client']['idClien'])&&isset($siComExiste['id_cli'])){
		if(isset($_POST['annuleCom'])){
?>	
			<div class="container"  style="height:150px; width:100%; margin:auto">
				<form class="form" role="form" action="panier.php" method="post" >
					<input type="hidden" name="idCli" value="<?=$_SESSION['client']['idClien']?>" class="anInput hidden">
					<input type="hidden" name="nean" value="nean">
					<div class="alert alert-danger" style="text-align:center; font-weight:bold; font-size:25px;">Être vous sûr de vouloir annuler votre commande?</div>
					<div class="action-form" style="width:200px; margin:auto">
						<button type="submit" class="btn btn-warning">OUI</button>
						<a href="panier.php" class="btn btn-primary">NON</a>
					</div>
				</form>
			</div>
<?php		// ....Fin
		}else{
			if(isset($_POST['nean'])){
				
			panier();
			include('voirCommande.php');
			}else{
			include('voirCommande.php');
			}
		}
	}else{ 
	
		panier();
	
	}
	
?>	
	
	
	
<?php	
	function panier(){
		$bdd= new BDD();
		$panier = new panier($bdd);
 ?>
<!--fin commande-->
		<div class="alert alert-warning panierVide" style="width:100%; text-align:center; display:none; font-size:20px; font-weight:bold;">Votre panier est vide</div>

			<h1 style="text-align:center">Votre panier</h1>
			
			<span id="mesge" style="color:red; font-size:30px;"> 
		<?php
				if(!empty($_SESSION['panierVide'])){
					echo $_SESSION['panierVide'];
				}

		?>	</span>
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
								<td><a href="?idSupp=<?=$donnee1['id_pro']?>"><span class="btn btn-danger glyphicon glyphicon-remove"></span></a></td>
							<tr/>
		<?php  			}  
					
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