<?php

	include('bdd.php');
	
	$idPro = verifierDonne($_GET['id_pro']);
	
	$nomImage = verifierDonne($_FILES['image']['name']);
	$tmp = file_get_contents($_FILES['image']['tmp_name']);

	$nomProduit= verifierDonne($_POST['nomProduit']);
	$cheminDesti= verifierDonne($_POST['cheminDesti']);
	$PIntervalle= verifierDonne($_POST['PIntervalle']);
	$poidsPrix = verifierDonne($_POST['poidsPrix']);
	$stock= verifierDonne($_POST['stock']);
	$description = verifierDonne($_POST['description']);
	

	$reqAjour='UPDATE produits SET
					image_pro = :image,
					nom_pro = :image_nom,
					chemin_desti= :chemin_desti,
					inter_poids = :poidsInter,
					prix = :prix,
					stock = :stock,
					info_pro = :infoPro,
					binaire = :binaire, 
					date_modif = NOW()
					WHERE id_pro = :idPro';
					
	$varAjour= array(
			'idPro' =>$idPro,
			'image'=>$nomImage,
			'image_nom'=>$nomProduit,
			'chemin_desti'=>$cheminDesti,
			'poidsInter'=>$PIntervalle,
			'prix'=>$poidsPrix,
			'stock'=>$stock,
			'infoPro'=>$description,
			'binaire'=>$tmp);
	
$bdd=new BDD();
$bdd->requetes( $reqAjour, $varAjour);
			
		
	header("Location:adminHeader.php?admin=metAJourProduits1");