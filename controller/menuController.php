

		<?php 
		require('../model/model.php');
		
		function menuController(){ // cette est appelée dans l'index
		?>
		<div class="container-fluid pouletMortChair">
		<?php
				$pouletsMorts= new PouletsMorts();
		if(isset($_GET['menu1'])){ 
			$menu1=verifierDonne($_GET['menu1']);
			if(isset($menu1)){
				if($menu1=='pouletsMortsChairs'){
					$pouletsMorts->pouletsChairsC();
					$pouletsMorts->pouletsChairsM();
				}else if($menu1=='pouletsMortsPondeuses'){
					$pouletsMorts->pouletsPondeuses();
				}else{
					require('../index/index.php');
				}
			}
		}
			
				$pouletsVivants= new PouletsVivants();
		if(isset($_GET['menu2'])){ 
			$menu2=verifierDonne($_GET['menu2']);
			if(isset($menu2)){
				if($menu2=='pouletsVivantsChairs'){
					$pouletsVivants->boeuf();
				}else if($menu2=='pouletsVivantsPondeuses'){
					$pouletsVivants->mouton();
				}else if($menu2=='pouletsVivantsCokeles'){
					$pouletsVivants->bouc();
					//$pouletsVivants->pouletsVivantsAfricains();
				}else{
					require('../index/index.php');
				}
			}
		}
		
				$oeufs= new Oeufs();
		if(isset($_GET['menu3'])){ 
			$menu3=verifierDonne($_GET['menu3']);
			if(isset($menu3)){
				if($menu3=='oeufsPondeuses'){
					$oeufs->poissons();
					//$oeufs->oeufsAfricains();
				}else{
					require('../index/index.php');
				}	
			}
		}
		
				$poussins=new Poussins();
		if(isset($_GET['menu4'])){ 
			$menu4=verifierDonne($_GET['menu4']);
			if(isset($menu4)){
				if($menu4=='poussinsChairs'){
					$poussins->oeufs();
				}else{
					require('../index/index.php');
				}
			}
		}
		
		if(isset($_GET['section'])){ 
			$section=verifierDonne($_GET['section']);
			if(isset($section)){
				if($section=='oeufs'){
					$poussins->oeufs();
				}else if($section=='pouletCom'){
					$pouletsMorts->pouletsChairsC();
					$pouletsMorts->pouletsChairsM();
				}else if($section=='pouletMor'){
					$pouletsMorts->pouletsChairsM();
					$pouletsMorts->pouletsChairsC();
				}else if($section=='poissons'){
					$oeufs->poissons();
				}else if($section=='pondeuses'){
					$pouletsMorts->pouletsPondeuses();
				}else if($section=='boeuf'){
					$pouletsVivants->boeuf();
				}else if($section=='mouton'){
					$pouletsVivants->mouton();
				}else if($section=='bouc'){
					$pouletsVivants->bouc();
				}else{
					require('../index/index.php');
				}
			}
		}
		
		if(isset($_GET['recherche'])){
			include("../view/recherche.php");
		}
	?>
	</div>
	<?php	
		}
		
	?>
