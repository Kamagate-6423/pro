

		<?php 
		require('../model/model.php');
		
		function menuController(){ // cette est appelée dans l'index
		?>
		<div class="container-fluid pouletMortChair">
		<?php
				$pouletsMorts= new PouletsMorts();
			if(isset($_GET['menu1'])){
				if($_GET['menu1']=='pouletsMortsChairs'){
					$pouletsMorts->pouletsMortsChairsC();
					$pouletsMorts->pouletsMortsChairsM();
				}else if($_GET['menu1']=='pouletsMortsPondeuses'){
					$pouletsMorts->pouletsMortsPondeusesC();
				}else{
					require('../index/index.php');
				}
			}
			
				$pouletsVivants= new PouletsVivants();
			if(isset($_GET['menu2'])){
				if($_GET['menu2']=='pouletsVivantsChairs'){
					$pouletsVivants->pouletsVivantsChairs();
				}else if($_GET['menu2']=='pouletsVivantsPondeuses'){
					$pouletsVivants->pouletsVivantsPondeuses();
				}else if($_GET['menu2']=='pouletsVivantsCokeles'){
					$pouletsVivants->pouletsVivantsCokeles();
					//$pouletsVivants->pouletsVivantsAfricains();
				}else{
					require('../index/index.php');
				}
			}
			
				$oeufs= new Oeufs();
			if(isset($_GET['menu3'])){
				if($_GET['menu3']=='oeufsPondeuses'){
					$oeufs->oeufsPondeuses();
					//$oeufs->oeufsAfricains();
				}else{
					require('../index/index.php');
				}	
			}

			
				$poussins=new Poussins();
			if(isset($_GET['menu4'])){
				if($_GET['menu4']=='poussinsChairs'){
					$poussins->poussinsChairs();
				}else{
					require('../index/index.php');
				}
			}
			
			if(isset($_GET['section'])){
				if($_GET['section']=='poussins'){
					$poussins->poussinsChairs();
				}else if($_GET['section']=='chairs'){
					$pouletsVivants->pouletsVivantsChairs();
					$pouletsMorts->pouletsMortsChairsC();
					$pouletsMorts->pouletsMortsChairsM();
				}else if($_GET['section']=='congeletC'){
					$pouletsMorts->pouletsMortsChairsC();
				}else if($_GET['section']=='congeletM'){
					$pouletsMorts->pouletsMortsChairsM();
				}else if($_GET['section']=='oeufs'){
					$oeufs->oeufsPondeuses();
					$oeufs->oeufsAfricains();
				}else if($_GET['section']=='pondeuses'){
					$pouletsVivants->pouletsVivantsPondeuses();
					$pouletsMorts->pouletsMortsPondeusesC();
				}else if($_GET['section']=='cokeles'){
					$pouletsVivants->pouletsVivantsCokeles();
				}else if($_GET['section']=='africains'){
					$pouletsVivants->pouletsVivantsAfricains();
				}else{
					require('../index/index.php');
				}
			}
	?>
	</div>
	<?php	
		}
		
	?>
