<?php
session_start();
include('../administration/bdd.php'); 

$bdd= new BDD();
	$votrePasse="";
	$votrePasse1="";
if(isset($_POST['nom']) && isset($_POST['tel']) && isset($_POST['prenom'])){
	$nom=verifierDonne($_POST['nom']);
	$prenom=verifierDonne($_POST['prenom']);
	$tel=verifierDonne($_POST['tel']);
	
	$tel=substr($tel,-8);
	
	$reqListe='SELECT tel_cli FROM clients WHERE tel_cli=? AND nom_cli=?';//initier pour vérifier si le numero existe dans la base
	$req1=$bdd->requetes($reqListe,array($tel, $nom)); // la class bdd est definie dans dossier administration
	$donnee1=$req1->fetch();
	
	if(!empty($donnee1['tel_cli'])){
		$reqPass='INSERT INTO passes(nom, prenom, tel, date_message)
				VALUES(:nom, :prenom, :tel, NOW())';
		$varPass=array(
			'nom'=>$nom,
			'prenom' =>$prenom,
			'tel'=>$tel);
	
		$bdd->requetes($reqPass,$varPass);
		
		$votrePasse="Votre demande est en cours de traitement...., vous allez recevoir un SMS de rénitialisation de mot de passe";
	}else{
		$votrePasse1="Nom ou numero de tel: incorrect";
	}
		
}elseif(isset($_POST['passe1']) && isset($_POST['passe2']) && isset($_POST['passe3']) && isset($_POST['tel1'])){
		$tel1=verifierDonne($_POST['tel1']);
		$passe1=verifierDonne($_POST['passe1']);
		$passe2=verifierDonne($_POST['passe2']);
		$passe3=verifierDonne($_POST['passe3']);
		
		$tel1=substr($telCli,-8);
		
	$reqListe='SELECT tel_cli FROM clients WHERE tel_cli=? AND pass_cli=?';//initier pour vérifier si le numero existe dans la base
	$req1=$bdd->requetes($reqListe,array($tel1, $passe1)); // la class bdd est definie dans dossier administration
	$donnee1=$req1->fetch();
	
	if(!empty($donnee1['tel_cli'])){
	
		if($passe2==$passe3){
			$reqPassN='UPDATE clients SET
					pass_cli = :passeN
					WHERE pass_cli = :passe';
					
			$varPassN= array(
				'passeN' =>$passe3,
				'passe'=>$passe1
			);
			
			$bdd->requetes($reqPassN, $varPassN);
			$votrePasse="Votre mot de passe est modifié, vous pouvez vous connecter.";
		}else{
			$votrePasse1="Numero de tel ou mot de passe: incorrect";
		}
	}else{
		$votrePasse1="Numero de tel ou mot de passe: incorrect";
	}
}else{
	$votrePasse1="Votre demande n'a pas été traité ni enregistré: contactez nous au : 0022564230411";
}

	unset($_SESSION['insciption']);
	unset($_SESSION['connexion']);
	unset($_SESSION['connexionEchouer']);

	$_SESSION['votrePasse1']=$votrePasse1;
	$_SESSION['votrePasse']=$votrePasse;
	header("location:client.php");