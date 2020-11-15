<?php
session_start();
if((isset($_POST['nom']) && isset($_POST['tel'])) || (isset($_POST['passe1']) && isset($_POST['passe2']) && isset($_POST['passe3']) && isset($_POST['tel1']))){
	include("../controller/passes.php");
}else{
	if(isset($_SESSION['client']['idClien'])){
		header("location:../index/index.php");
	}else{
		include('header.php');
	?>
				<div  class="form1">
				<div class="nb">
					<dl><dt>NB:</dt>
						<dd>Le paiement se fait seulement à la livraison</dd>
						<dd>Une fois confirmer vous allez recevoir un appel téléphonique dans 15 min</dd>
					</dl>
				</div>
				
	<?php 		if(isset($_SESSION['inscription']) || isset($_SESSION['connexion']) || !empty($_SESSION['connexionEchouer']) || isset($_SESSION['votrePasse']) || isset($_SESSION['votrePasse1'])){
				
					if(isset($_SESSION['inscription']) && $_SESSION['inscription']!=""){
						//echo $_SESSION['inscription'];
						echo'<div class="alert alert-success message" role="alert" ><strong>'.$_SESSION['inscription'].'</strong></div>';
						
					}else if(isset($_SESSION['connexion']) && $_SESSION['connexionEchouer']!=""){
						//echo $_SESSION['connexionEchouer']="";
						echo'<div class="alert alert-warning message" role="alert" ><strong>'.$_SESSION['connexionEchouer']="".'</strong></div>';
						
					}else if(!empty($_SESSION['connexionEchouer']) && $_SESSION['connexionEchouer']!="" ){
						//echo $_SESSION['connexionEchouer'];
						echo'<div class="alert alert-warning message" role="alert" ><strong>'.$_SESSION['connexionEchouer'].'</strong></div>';
					}else if(isset($_SESSION['votrePasse']) || isset($_SESSION['votrePasse1'])){
						if(isset($_SESSION['votrePasse']) && $_SESSION['votrePasse']!=""){
							echo'<div id="message" class="alert alert-success message" role="alert"><strong>'.$_SESSION['votrePasse'].'</strong></div>';
						}else{
							echo'<div class="alert alert-warning message" role="alert" ><strong>'.$_SESSION['votrePasse1'].'</strong></div>';
						}
					}
			 }
	?>
		
	<div class="form">
	<?php function connecter(){?>


			<form method="post" action="../controller/requeteClients.php?connexion=connexion" role="form" class="connexion">
				<fieldset class="field"><legend>Connexion</legend>
					<table>
						<tr>
							<td> <label for="telCli1"> Numero de téléphone</label></td>
							<td><input type="tel" id="telCli1" name="telCli" placeholder="08877639" required><br/><span class="help-inline telCli1"></span></td>
						</tr>
						<tr>
							<td> <label for="passCli1">Mot de passe</label> </td><td><input type="password" id="passCli1" name="passCli" required><br/><span class="passCli1"></span></td>
						</tr>
					</table>
					<table style="margin-top:20px; width:100%;">
						<tr>
							<td colspan="2"><a href="#" class="connexion1"><input type="submit" value="Confirmer"  class="connexion btn btn-primary" style="margin-left:50%"></a></td>
						</tr>
					</table>
				</fieldset>	
			</form>
			<br/>
			
			
			<div class="form">
			<button type="button "class="btn-warning ouvrePassOublier" style="font-weight:bold; color:#000">Mot de passe oublier</button>
			<form method="post" action="client.php" role="form" class="motDePassOubli" style="display:none">
			
				<fieldset class="field"><legend>Mot de passe oublier<button class="btn btn-danger fermer" style="margin-left:80%"><span class="glyphicon glyphicon-remove"></span></button></legend>
				<div style="text-align:center">Remplir ces champs pour la rénitialisation de votre mot de passe</div>
					<table>
						<tr>
							<td> <label for="nom">Nom</label> </td><td><input type="text" id="nom" name="nom" maxlength="20" required><br/><span class="nom"></span></td>
						</tr>
						<tr>
							<td> <label for="prenom">Prenom</label> </td><td><input type="text" id="prenom" name="prenom" maxlength="20" required><br/><span class="prenom"></span></td>
						</tr>
						<tr>
							<td> <label for="tel"> Numero de téléphone</label></td>
							<td><input type="tel" id="tel" name="tel" placeholder="08877639" maxlength="13" required><br/><span class="help-inline tel"></span></td>
						</tr>
					</table>
					<table style="margin-top:20px; width:100%;">
						<tr>
							<td colspan="2"><a href="#" class="passOublier"><input type="submit" value="Confirmer"  class="passOublier btn btn-primary" style="margin-left:50%"></a></td>
						</tr>
					</table>
				</fieldset>	
			</form>
			</div>
			
			<br/>
	<?php }

		function inscrire(){
	?> 
			<form method="post" action="../controller/requeteClients.php?inscription=inscription">
				<fieldset class="field"><legend>Inscription</legend>
				
				<span class="passDifferent" id="passCliDifferent"> Les deux pass ne sont pas identiques</span>
					<table cellspacing="20">
						<tr>
							<td> <label for="nomCli">Nom<span style="color:red; font-size:16px"> *</span></label> </td>
							<td><input type="text" id="nomCli" name="nomCli" maxlength="20" required><br/><span class="nomCli"></span></td>
						</tr>
						<tr>
							<td> <label for="prenomCli">Prenom<span style="color:red; font-size:16px"> *</span></label></td>
							<td><input type="text" id="prenomCli" name="prenomCli" maxlength="20"  required><br/><span class="prenomCli"></span></td>
						</tr>
						<tr>
							<td> <label for="emailCli">Email</label></td>
							<td><input type="email" id="emailCli" name="emailCli" maxlength="50" ><br/><span class="emailCli"></span></td>
						</tr>
						<tr>
							<td> <label for="telCli"> Numero de téléphone<span style="color:red; font-size:16px"> *</span></label></td>
							<td><input type="tel" id="telCli" name="telCli" placeholder="08877639" maxlength="13" required class="inscrireTel"/><br/><span class="telCli"></span></td>
						</tr>
						<tr>
							<td> <label for="passCl">Mot de passe<span style="color:red; font-size:16px"> *</span></label> </td>
							<td><input type="password" id="passCli" name="passCli" maxlength="16" required class="pass1"><br/><span class="passCli"></span></td>
						</tr>
						<tr>
							<td><label for="passCliConf">Confirmer votre mot de passe<span style="color:red; font-size:16px"> *</span></label> </td><td><input type="password" id="passCliConf" name="passCliConf" maxlength="20" required class="pass2"><br/><span class="pass2Cli"></span></td>
						</tr>
						<tr>
						<td> <label for="adressCli">Adresse</label> </td>
							<td><textarea type="textarea" id="adresseCli" name="adresseCli" placeholder="Daloa, Orly 2, à la Maternité" maxlength="100" ></textarea><br/><span class="adresseCli"></span></td>
						</tr>
					</table>
					<table style="margin-top:20px; width:100%;">
						<tr>
							<td colspan="2"><input type="submit" value="Confirmer" class="btn btn-primary inscrireSubmit" style="margin-left:50%" /></td>
						</tr>
					</table>
				</fieldset>	
			</form>
	<?php }
		
		if(isset($_GET['connecter'])){
			connecter();
			inscrire();
		}else if(isset($_GET['inscrire'])){
			inscrire();
			connecter();
		}else{
			connecter();
			inscrire();
		}
		
	?>
	</div>
	</div>
	<?php
		include('footer.php');
	}
}
?>