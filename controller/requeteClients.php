<?php
session_start();
 include('../administration/bdd.php'); 
// Inscrire un client

$bdd= new BDD();

if(isset($_GET['inscription']) && $_POST['passCli']==$_POST['passCliConf']){
	$nomCli=verifierDonne($_POST['nomCli']);
	$prenomCli=verifierDonne($_POST['prenomCli']);
	$emailCli=verifierDonne($_POST['emailCli']);
	
	$passCli= verifierDonne($_POST['passCli']);
	$adresseCli=verifierDonne($_POST['adresseCli']);
	$telCli=verifierDonne($_POST['telCli']);
	
	
	$reqListe='SELECT tel_cli FROM clients WHERE tel_cli=?';//initier pour vérifier si le numero a deja ete l'objet d'une inscriprtion
	$req1=$bdd->requetes($reqListe,array($telCli)); // la class bdd est definie dans dossier administration
	$donnee1=$req1->fetch();
	
	if(!empty($donnee1['tel_cli'])){

		$_SESSION['inscription']="Le numéro a été déja utilisés pour une inscription sur ce  site.";
		$_SESSION['connexionEchouer']="";
		header('location:../view/client.php');
	}else{

		$reqCli='INSERT INTO clients(nom_cli, prenom_cli, email_cli, pass_cli, adresse_cli, tel_cli, date_inscription)
				VALUES(:nom, :prenom, :email, :pass, :adresse, :tel, NOW())';
		$varCli=array(
			'nom'=>$nomCli,
			'prenom'=>$prenomCli,
			'email'=>$emailCli,
			'pass'=>$passCli,
			'adresse'=>$adresseCli,
			'tel'=>$telCli);
	
		$bdd->requetes($reqCli,$varCli);
	
		$_SESSION['inscription']="Votre inscription a bien été prise en compte, vous pouvez vous connecter";
		$_SESSION['connexionEchouer']="";
	header('location:../view/client.php');
	}
	
}else if(isset($_GET['connexion']) && !empty($_POST['telCli']) && !empty($_POST['passCli'])){
	
	///connecter un client
		$telCli=verifierDonne($_POST['telCli']);
		$passCli=verifierDonne($_POST['passCli']);
		
		
		$reqCli='SELECT * FROM clients WHERE tel_cli=:tel';
		$varCli=array(
				'tel'=>$telCli
		);
		$reqVoirProduit = $bdd->requetes($reqCli,$varCli);
		
		$date_con='UPDATE clients SET date_connexion = NOW() WHERE tel_cli=:tel';
		$bdd->requetes($date_con, $varCli);
		
		$donnee=$reqVoirProduit->fetch();
		
		if(!empty($donnee)){
			//numero de l'administrateur
			if($donnee['tel_cli']==53959574 || $donnee['tel_cli']==7466996){
				$_SESSION['client']['idClien']=$donnee['id_cli'];
				$_SESSION['client']['nomAdministrateur']=$donnee['nom_cli'];
				$_SESSION['client']['prenomAdministrateur']=$donnee['prenom_cli'];
				header('location:../administration/adminHeader.php');
			}else{
		$_SESSION['client']['idClien']=$donnee['id_cli'];
		$_SESSION['client']['nomCli']=$donnee['nom_cli'];
		$_SESSION['client']['prenomCli']=$donnee['prenom_cli'];
		//$_SESSION['client']['emailCli']=$donnee['email_cli'];
		//$_SESSION['client']['telCli']=$donnee['tel_cli'];
		//$_SESSION['client']['passCli']=$donnee['pass_cli'];
		$_SESSION['client']['adresseCli']=$donnee['adresse_cli'];
		
		$_SESSION['connexion']="";
		$_SESSION['inscription']="";
		
		$_SESSION['commander']="";
		
		header('location:../index.php');
			}
		}else{
		
		$json['conEch']=$_SESSION['connexionEchouer']=" Numéro de tel ou Mots de passe incorrect";
		echo json_encode($json);
		
		$_SESSION['inscription']="";
		
		header('location:../view/client.php');
		
		}
		
	
	//header('location:../index.php');
}else{
	$_SESSION['connexionEchouer']="";
	header('location:../view/client.php');
}
	
	