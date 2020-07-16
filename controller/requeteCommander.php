<?php
//// Pour valider la commande
	
	include('requetePanier.php');
	
	if(isset($_SESSION['connexion']) && $_SESSION['compt']!==0){
	
	$pQte=implode(',',array_values($_SESSION['panier']));
	$pKeys=implode(',',array_keys($_SESSION['panier']));
	
	$lieuxL= verifierDonne($_POST['lieuxL']);
	$dateL= verifierDonne($_POST['dateL']);
	$heureL= verifierDonne($_POST['heureL']);
	$idCli=$_SESSION['client']['idClien'];
	
	$totalV=$panier->total();
	$comptV=$panier->compt();
	
	$reqValider='INSERT INTO commandes(id_cli, lieux_liv, date_liv, heure_liv, keys_pro, qtes_pro, prix_total ,date_valid)
				VALUES(:idCli, :lieux, :date, :heure, :pKeys, :pQte, :total, NOW())';
	
	$reqVariable=array(
		'idCli'=>$idCli,
		'lieux'=>$lieuxL,
		'date'=>$dateL,
		'heure'=>$heureL,
		'pKeys'=>$pKeys,
		'pQte'=>$pQte,
		'total'=>$totalV);
		
	 
	$date_con='UPDATE commandes SET date_valid = NOW() WHERE id_cli=:id';
		$bdd->requetes($date_con,array('id'=>$idCli));
		
	$bdd->requetes($reqValider,$reqVariable);
	
		$_SESSION['commander']="Votre commande a bien été enrégistrée vous allez recevoir un appel 30 min avant la livraison. ";
		$json['comVal']="Commande a bien été enrégistrée vous allez recevoir un appel 30 min avant la livraison";
		echo json_encode($json);
		
		unset($_SESSION['panier']);
	}else{
		
		$_SESSION['commander']="Vous devez vous connecter avant de faire passer une commande sinon inscrivez-vous.";
		
	}
	
	header("Location:../view/commander.php");
	
?>