

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
					$pouletsMorts->pouletsMortsChairsC();
					$pouletsMorts->pouletsMortsChairsM();
				}else if($menu1=='pouletsMortsPondeuses'){
					$pouletsMorts->pouletsMortsPondeusesC();
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
					$pouletsVivants->pouletsVivantsChairs();
				}else if($menu2=='pouletsVivantsPondeuses'){
					$pouletsVivants->pouletsVivantsPondeuses();
				}else if($menu2=='pouletsVivantsCokeles'){
					$pouletsVivants->pouletsVivantsCokeles();
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
					$oeufs->oeufsPondeuses();
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
					$poussins->poussinsChairs();
				}else{
					require('../index/index.php');
				}
			}
		}
		
		if(isset($_GET['menu1'])){ 
			$section=verifierDonne($_GET['section']);
			if(isset($section)){
				if($section=='poussins'){
					$poussins->poussinsChairs();
				}else if($section=='chairs'){
					$pouletsVivants->pouletsVivantsChairs();
					$pouletsMorts->pouletsMortsChairsC();
					$pouletsMorts->pouletsMortsChairsM();
				}else if($section=='congeletC'){
					$pouletsMorts->pouletsMortsChairsC();
				}else if($section=='congeletM'){
					$pouletsMorts->pouletsMortsChairsM();
				}else if($section=='oeufs'){
					$oeufs->oeufsPondeuses();
					$oeufs->oeufsAfricains();
				}else if($section=='pondeuses'){
					$pouletsVivants->pouletsVivantsPondeuses();
					$pouletsMorts->pouletsMortsPondeusesC();
				}else if($section=='cokeles'){
					$pouletsVivants->pouletsVivantsCokeles();
				}else if($section=='africains'){
					$pouletsVivants->pouletsVivantsAfricains();
				}else{
					require('../index/index.php');
				}
			}
		}
	?>
	</div>
	<?php	
		}
		
	?>
