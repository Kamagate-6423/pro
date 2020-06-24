

<?php

	include('bdd.php');
	$nomImage = $_FILES['image']['name'];
	$tmp = file_get_contents($_FILES['image']['tmp_name']);
	$identifiant=$_POST['identifiant'];
	$nomProduit=$_POST['nomProduit'];
	$PIntervalle=$_POST['PIntervalle'];
	$poidsPrix = $_POST['poidsPrix'];
	$stock1=$_POST['stock'];
	$description = $_POST['description'];
	

$bdd=new BDD();
$bdd->requetes('INSERT INTO produits(id_pro,image_pro,nom_pro,inter_poids,prix,stock,info_pro,binaire, date_modif)
				VALUES(:id_pro,:image, :image_nom, :intervalle, :poidsPrix, :stock, :descrip, :binaire, NOW())',
				array(
			'id_pro'=>$identifiant,
			'image'=>$nomImage,
			'image_nom'=>$nomProduit,
			'intervalle'=>$PIntervalle,
			'poidsPrix'=>$poidsPrix,
			'stock'=>$stock1,
			'descrip'=>$description,
			'binaire'=>$tmp));
			
		
		
header("Location:adminHeader.php");