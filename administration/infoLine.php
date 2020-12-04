<?php 
	include('bdd.php');
	$bdd= new BDD();
	
	if(isset($_POST['categorie']) && $_POST['categorie']!=""){
			$cate=$_POST['categorie'];
			$info=$_POST['info'];

			$reqInfo='UPDATE information SET
							info = :info, 
							date_info = NOW()
							WHERE categorie = :cate';
							
			$varInfo= array(
					'cate' =>$cate,
					'info'=>$info
					);
				$bdd->requetes($reqInfo,$varInfo);
			
		$_SESSION['adminAlert']="L'information de ".$cate." a bien été modifiée";
	}
	
	
	$reqInfo='SELECT info FROM information WHERE categorie=:cate';
		$varInfo=array(
				'cate'=>"apropos"
		);
		$infoLine = $bdd->requetes($reqInfo,$varInfo);
		$donneApropos=$infoLine->fetch();
?>

<fieldset><legend>Modifier les information</legend>
	<form method="post" action="?admin=infoLine" enctype="multipart/form-data" class="form col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<table>
			<tr style="margin-bottom:5px">
				<td><label for="categorie">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="infoLine">Info-line</option>
						<option value="apropos" selected>Apropos</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="info">Information</label></td>
				<td><textarea type="text" id="info" name="info"><?=$donneApropos['info']?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id=1"><input type="submit" value="Valider la modification"></a></td>
			</tr>
		</table>
	</form>
</fieldset>


<?php


?>