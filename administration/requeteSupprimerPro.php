<?php
include('bdd.php');

	$identifiant=$_POST['identifiant'];
	$nomProduit=$_POST['nomProduit'];
	

$bdd=new BDD();
$bdd->requetes('DELETE FROM produits WHERE id_pro=? AND nom_pro=?',
				array($identifiant, $nomProduit));
			
			
	header("Location:adminHeader.php");