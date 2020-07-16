<?php
session_start();
include('bdd.php');
	
		$bdd=new BDD();
		// Supprimer produit
if(isset($_POST['identifiant'])&&isset($_POST['nomProduit'])){
	$identifiant=verifierDonne($_POST['identifiant']);
	$nomProduit=verifierDonne($_POST['nomProduit']);
	$bdd->requetes('DELETE FROM produits WHERE id_pro=? AND nom_pro=?',
				array($identifiant, $nomProduit));
	
	$_SESSION['adminAlert']="Le produit ".$nomProduit." a été supprimé";
	header("Location:adminHeader.php?admin=supprimerPro");
		
		//Suprimr clients
}elseif(isset($_POST['suppCli'])){
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$idCli=verifierDonne($_POST['suppCli']);
	$bdd->requetes('DELETE FROM clients WHERE id_cli=?',
			array($idCli));
			
	$_SESSION['adminAlert']="Le client ".$nom." ".$prenom." a été supprimé";
	header("Location:adminHeader.php?admin=listeClients");
			
}elseif(isset($_POST['suppCom'])){ //Supprimer Commande
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$idCom=verifierDonne($_POST['suppCom']);
	$bdd->requetes('DELETE FROM commandes WHERE id_com=?',
				array($idCom));
	
	$_SESSION['adminAlert']="La commande du client ".$nom." ".$prenom." a été supprimé";
	header("Location:adminHeader.php?admin=listeCommandes");
}else{	
	header("Location:adminHeader.php");
	}