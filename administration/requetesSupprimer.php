<?php
include('bdd.php');
	
		$bdd=new BDD();
		// Supprimer produit
if(isset($_POST['identifiant'])&&isset($_POST['nomProduit'])){
	$identifiant=$_POST['identifiant'];
	$nomProduit=$_POST['nomProduit'];
	$bdd->requetes('DELETE FROM produits WHERE id_pro=? AND nom_pro=?',
				array($identifiant, $nomProduit));
		
		
		//Suprimr clients
}elseif(isset($_POST['suppCli'])){
	$idCli=$_POST['suppCli'];
	$bdd->requetes('DELETE FROM clients WHERE id_cli=?',
			array($idCli));
			
}else{ //Supprimer Commande
	$idCom=$_POST['suppCom'];
	$bdd->requetes('DELETE FROM commandes WHERE id_com=?',
				array($idCom));
}
			
	header("Location:adminHeader.php");