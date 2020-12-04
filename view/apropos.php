<?php
	$bdd= new BDD();
	$reqInfo='SELECT info FROM information WHERE categorie=:cate';
		$varInfo=array(
				'cate'=>"apropos"
		);
		$infoLine = $bdd->requetes($reqInfo,$varInfo);
		$donneApropos=$infoLine->fetch();
?>

<div>
	<?=$donneApropos['info']?>
</div>