<?php
include('bdd.php');
	
	$bdd=new BDD();
	$id=$_GET['id_com'];
	
	$reqInfo='SELECT cli.id_cli id_cli, cli.nom_cli nom,
				cli.prenom_cli prenom, cli.tel_cli tel, 
				cli.email_cli email, com.id_cli comIdCli,
				com.id_com id_com, com.lieux_liv lieux_liv,
				com.date_liv date_liv, com.heure_liv heure_liv,
				com.date_liv date_liv, com.heure_liv heure_liv,
				com.keys_pro keyss, com.qtes_pro qtes,
				com.prix_total prixTotal
				FROM commandes AS com, clients AS cli WHERE com.id_cli = cli.id_cli AND com.id_com = ?';
	
	$variableInfo=array($id);
	
	$req=$bdd->requetes($reqInfo,$variableInfo);
	$donnee=$req->fetch();
	
	$pKeys=explode(',',$donnee['keyss']); // recupère les clés des produits dans la commande
	$pQte=explode(',',$donnee['qtes']); // recupère les quentités de chaque produit
	$somQte=array_sum($pQte);
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vente de poulets</title>
	<link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/bootstrap.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
	div{
		border:1px solid black;
		height:auto;
	}
	.div12{
		height:auto;
		margin:auto;
		width:300px;
		
	}
  </style>
  <body >
		<div>
			
		</div>
  
		<div class="div12">
			<div>
					<table class="tab">
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
				<!--<th> IMAGE</th>-->
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
				$reqInfo1='SELECT image_pro, nom_pro, inter_poids, prix FROM produits WHERE id_pro=:image_id';
				$variableInfo1=array('image_id'=>$image_id);
				
				$req1=$bdd->requetes($reqInfo1,$variableInfo1);
				$donnee1=$req1->fetch();
				
			 ?>
				<tr>
					<!--<td><img src="../image/<?=$donnee1['image_pro']?>" alt="" style="width:100px"></td>-->
					<td><?=$donnee1['nom_pro']?><br><?=$donnee1['inter_poids']?></td>
					<td><?=$qte=$pQte[$i]; ?> </td>
					<td><?=$total1=$donnee1['prix']*$qte;?> fcfa</td>
				<tr/>
				
			<?php 
				$total+=$total1;
			}  
			
			?>
			</tbody>
			<tfoot>
				<td colspan="2">TOTAL </td>
				<td><strong> <?=$total?> fcfa</strong> </td>
			</tfoot>
		</table>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="../public/css/jquery-3.3.1.js"></script>
	
	<script type="text/javascript" src="../public/css/script.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../public/css/bootstrap.js"></script>
	
	
  </body>
</html>