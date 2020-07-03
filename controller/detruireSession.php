<?php
session_start();

include('../administration/bdd.php');
$bdd=new BDD();

if(isset(verifierDonne($_GET['ok']))){ // Lorsqu'une personne valide sa commande 
	unset($_SESSION['panier']);
	unset($_SESSION['commander']);
	unset($_SESSION['compt']);
	
}else{ // Lorsqu'une personne se deconnecte
	session_destroy();
	
	$idCli=verifierDonne($_POST['idCli']);

	$date_con='UPDATE clients SET date_connexion = NOW() WHERE id_cli=:id';
		$bdd->requetes($date_con,array('id'=>$idCli));
}

header("Location:../index.php");