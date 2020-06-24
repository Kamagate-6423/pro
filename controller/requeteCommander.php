<?php
//// Pour valider la commande
	
	include('requetePanier.php');
	
	if(isset($_SESSION['connexion']) && $_SESSION['compt']!==0){
	
	$pQte=implode(',',array_values($_SESSION['panier']));
	$pKeys=implode(',',array_keys($_SESSION['panier']));
	
	$lieuxL=strip_tags($_POST['lieuxL']);
	$dateL=strip_tags($_POST['dateL']);
	$heureL=strip_tags($_POST['heureL']);
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
		
	 
	$bdd->requetes($reqValider,$reqVariable);
	
		$_SESSION['commander']="Commande a bien été enrégistrée vous allez recevoir un appel 30 min avant la livraison. ";
		$json['comVal']="Commande a bien été enrégistrée vous allez recevoir un appel 30 min avant la livraison";
		echo json_encode($json);
		
		unset($_SESSION['panier']);
	}else{
		
		$_SESSION['commander']="Vous devez vous connecter avant de faire passer une commande sinon inscrivez-vous.";
		
	}
	
	header("Location:../view/commander.php");
	
?>