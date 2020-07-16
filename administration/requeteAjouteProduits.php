
<?php
session_start();
include('bdd.php');	

	$nomImage = verifierDonne($_FILES['image']['name']);
	$imageChemin="../public/image/".basename($nomImage);
	$imageExtension=pathinfo($imageChemin,PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['image']['tmp_name'], $imageChemin);
	
	$tmp =""; ///file_get_contents($_FILES['image']['tmp_name']);
	
	$identifiant= verifierDonne($_POST['identifiant']);
	$nomProduit= verifierDonne($_POST['nomProduit']);
	$PIntervalle= verifierDonne($_POST['PIntervalle']);
	$poidsPrix = verifierDonne($_POST['poidsPrix']);
	$stock1= verifierDonne($_POST['stock']);
	$description = verifierDonne($_POST['description']);
	$chemin= verifierDonne($_POST['chemin']);
		
		
		$bdd=new BDD();
		$bdd->requetes('INSERT INTO produits(id_pro,image_pro,nom_pro,inter_poids,prix,stock,info_pro,binaire, chemin_desti, date_modif)
				VALUES(:id_pro,:image, :image_nom, :intervalle, :poidsPrix, :stock, :descrip, :binaire, :chemin, NOW())',
				array(
			'id_pro'=>$identifiant,
			'image'=>$nomImage,
			'image_nom'=>$nomProduit,
			'intervalle'=>$PIntervalle,
			'poidsPrix'=>$poidsPrix,
			'stock'=>$stock1,
			'descrip'=>$description,
			'binaire'=>$tmp,
			'chemin'=>$chemin));
			
	$_SESSION['adminAlert']="Le produit ".$nomProduit." a été ajouté";

header("Location:adminHeader.php?admin=ajouteProduits");