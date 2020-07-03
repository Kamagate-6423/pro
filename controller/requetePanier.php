<?php
include('../administration/bdd.php');
	
	$bdd= new BDD();
	 
		if(isset($_GET['id'])){
			$id=verifierDonne($_GET['id']);
		$reqSql='SELECT id_pro FROM produits WHERE id_pro=:id';
		$reqVariable=array('id'=>$id);
		$req = $bdd->requetes($reqSql,$reqVariable);
		
		$donnee=$req->fetch();
			if(empty($req)){
				die("Ce produit est epuisé.");
			}
	
		$idPoduitsSelect=$donnee['id_pro'];
		}
			
		
	class panier{
		private $bdd;
		
		public function __construct($bdd){
			if(!isset($_SESSION)){
				session_start();
			}
			if(!isset($_SESSION['panier'])){
				$_SESSION['panier']= array();
			}
			if(isset($_GET['idSupp'])){
				
				$idSupp=verifierDonne($_GET['idSupp']);
				$this->supp($idSupp);
			}
			if(isset($_POST['panier']['quantite'])){
				$this->actualiseQte();
			}
			
			$this->bdd=$bdd;
		}
		public function actualiseQte(){
			$_SESSION['panier']= $_POST['panier']['quantite'];
		}
		
		public function total(){
			unset($_SESSION['panier']['']);
			
			$ids=array_keys($_SESSION['panier']);
			$req1=$this->bdd->requetes('SELECT id_pro, prix FROM produits WHERE id_pro IN ('.implode(',',$ids).')');
			$qte=1;
			$montant=0;
			$total=0;
			while($donnee1=$req1->fetch()){ 
				$qte=$_SESSION['panier'][$donnee1['id_pro']];
				$montant=$donnee1['prix']*$qte;
				$total+=$montant; 
				}  
			$req1->closeCursor();
			return $total;
		}
		
		public function compt(){
			return array_sum($_SESSION['panier']);
		}
		
		public function add($idProduitsSelect){  // la fonction add() permet d'ajouter un produit dans le panier
			if(isset($_SESSION['panier'][$idProduitsSelect])){
					$_SESSION['panier'][$idProduitsSelect]++;
			}else{
			$_SESSION['panier'][$idProduitsSelect]=1;
			}
		}
		
		public function supp($idSupp){
			unset($_SESSION['panier'][$idSupp]);
		}
	}
	
	$panier= new panier($bdd);
	
	 
	if(!empty($_GET['id'])){
		$panier->add($idPoduitsSelect); // la fonction add() est appelée
		
		$json['message']='Le produit à bien été ajouté';
		$json['total']=$panier->total();
		$json['compt']=$panier->compt();
		echo json_encode($json);
		
		
	}
	
	if(!empty($_GET['dePanier'])){
		
		$json['compt']=$_SESSION['compt']=$panier->compt();
		echo json_encode($json);
		}