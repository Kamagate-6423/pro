<?php
	class BDD{
		private $serveur='localhost';
		private $baseDeDonnee='kafissa';
		private $utilisateur='root';
		private $motDePasse='';
		private $connexion;
		
		public function __construct($serveur=NULL, $baseDeDonnee=NULL, $utilisateur=NULL, $motDePasse=NULL){
			
			if($serveur!=NULL){
				$this->serveur=$verseur;
				$this->table=$baseDeDonnee;
				$this->utilisateur=$utilisateur;
				$this->motDePasse=$motDePasse;
			}
			try{
			$this->connexion=new PDO('mysql:host='.$this->serveur.';dbname='.$this->baseDeDonnee.'; charset=utf8',$this->utilisateur,$this->motDePasse);
			}catch(Exception $e){
				echo "ERREUR de connexion à la base de donnée : ".$e->getMessage();
			}
		}
		
		public function requetes($sql=NULL, $variable=array()){
			$req=$this->connexion->prepare($sql);
			$req->execute($variable);
			
			return $req;
		}
	}
	
	function checkData($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		
		return $data;
	}
	
	