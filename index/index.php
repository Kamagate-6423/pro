	
	<?php require('../view/header.php') ?>
	
	<?php require('../controller/menuController.php') ?>
	

	<?php 
	// cette partie gère le menu et la section de la page d'accueil
	
		if(isset($_GET['menu1']) || isset($_GET['menu2']) || isset($_GET['menu3']) || isset($_GET['menu4']) || isset($_GET['section'])){
			menuController(); // cette fonnction est definir dans le controller
		}else{
			require('../view/section.php');
			}
	?>
	
	<?php include('../view/footer.php') ?>
  
	