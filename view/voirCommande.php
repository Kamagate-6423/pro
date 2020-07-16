<?php
//include('../administration/bdd.php');

	$idCli=$_SESSION['client']['idClien'];
	
	if(isset($_POST['idCli'])){ // pour la suppression de la commande
		$bdd->requetes('DELETE FROM commandes WHERE id_cli=?',array($idCli)); // $bdd extencié dans panier/
		
	}else{ //Sinon affiche la commande existante
	
		$reqInfo='SELECT cli.id_cli id_cli, cli.nom_cli nom,
					cli.prenom_cli prenom, cli.tel_cli tel, 
					cli.email_cli email, com.id_cli comIdCli,
					com.id_com id_com, com.lieux_liv lieux_liv,
					com.date_liv date_liv, com.heure_liv heure_liv,
					com.date_liv date_liv, com.heure_liv heure_liv,
					com.keys_pro keyss, com.qtes_pro qtes,
					com.prix_total prixTotal
					FROM commandes AS com, clients AS cli WHERE com.id_cli = ? AND cli.id_cli=?';
		
		$variableInfo=array($idCli,$idCli);
		
		$req=$bdd->requetes($reqInfo,$variableInfo);
		$donnee=$req->fetch();
			
			if(!empty($donnee)){ // permet de verifier que la commande existe ou pas
		
				$pKeys=explode(',',$donnee['keyss']); // recupère les clés des produits dans la commande
				$pQte=explode(',',$donnee['qtes']); // recupère les quentités de chaque produit
				$somQte=array_sum($pQte);
	?>
				  <style>
					.div12{
						height:auto;
						margin:auto;
						width:300px;	
					}
				  </style>
						<div class="div12"><h1 style="text-align:center">Votre commande</h1>
							<div>
								<table class="tab" style='z-index:100'>
									<tr ><h2 style="background-color:#AAA;">Poulet KAMSA</h2>
									</tr>
									<tr>
										<td>Nom et prénom</td>
										<td><?=$donnee['nom']?> <?=$donnee['prenom']?> </td>
									</tr>
									<tr>
										<td>Tel</td>
										<td><?=$donnee['tel']?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><?=$donnee['email']?></td>
									</tr>
									<tr>
										<td>Lieux de livraison</td>
										<td><?=$donnee['lieux_liv']?></td>
									</tr>
									<tr>
										<td>Date de livraison</td>
										<td><?=$donnee['date_liv']?></td>
									</tr>
									<tr>
										<td>Heure de livraison</td>
										<td><?=$donnee['heure_liv']?></td>
									</tr>
									<tr>
										<td>Somme total</td>
										<td><?=$donnee['prixTotal']?></td>
									</tr>
									</table>
							</div>
							
						</div>

				 <table class="facture">
							<thead>
								<th> IMAGE</th>
								<th> NOM</th>
								<th> QUANTITES</th>
								<th> MONTANTS</th>
							</thead>
							<tbody>
							<?php 
							$total1=0;
							$total=0;
							$qte=0;
							
							for($i=0;$i<sizeof($pKeys);$i++){ //permet de parcourir les clies des produits
								$image_id=$pKeys[$i]; 
								$reqInfo1='SELECT id_pro, image_pro, nom_pro, inter_poids, prix FROM produits WHERE id_pro=:image_id';
								$variableInfo1=array('image_id'=>$image_id);
								
								$req1=$bdd->requetes($reqInfo1,$variableInfo1);
								$donnee1=$req1->fetch();
								
							 ?>
								<tr>
									<td><img src="../public/image/<?=$donnee1['image_pro']?>" alt="" style="width:100px"></td>
									<td><?=$donnee1['nom_pro']?><br><?=$idCli?></td>
									<td><?=$qte=$pQte[$i]; ?> <?php 
						if($donnee1['id_pro']<=4){
							
							//nean
						}else{
					?>Kg
						<?php }?> </td>
									<td><?=$total1=$donnee1['prix']*$qte;?> fcfa</td>
								<tr/>
								
							<?php 
								$total+=$total1;
							}  
							
							?>
							</tbody>
							<tfoot>
								<td colspan="3">TOTAL </td>
								<td><strong> <?=$total?> fcfa</strong> </td>
							</tfoot>
						</table>
						
				<form method="post" action="panier.php" class="annuleForm">
					<input type="hidden" name="idCli" value="<?=$_SESSION['client']['idClien']?>" class="anInput hidden">
					<input type="hidden" name="annuleCom">
					<button type="submit" style="text-align:center" class="btn btn-danger annuleCom"><span class="glyphicon glyphicon-remove"></span> Annuler ma commande </button>
				</form>
				<?php
				 $_SESSION['commande']="commande";
			}
	  
	}
	
	
	?>