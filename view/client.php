<?php
session_start();
	include('header.php');
?>
<div  class="form1">
	<div class="nb">
		<dl><dt>NB:</dt>
			<dd>Le paiement se fait seulement à la livraison</dd>
			<dd>Une fois confirmer vous allez recevoir un appel téléphonique dans 15 min</dd>
		</dl>
	</div>
	<span id="mesge" style="color:orange; font-size:30px;"> <?php
	
	if(isset($_SESSION['inscription'])){
		echo $_SESSION['inscription'];
	}
	
	if(isset($_SESSION['connexion'])){
		echo $_SESSION['connexionEchouer']="";
	}else if(!empty($_SESSION['connexionEchouer'])){
		echo $_SESSION['connexionEchouer'];
	}

	?></span>
	
<div class="form">
<?php function connecter(){?>


		<form method="post" action="../controller/requeteClients.php?connexion=connexion" role="form" class="connexion">
			<fieldset class="field"><legend>Connexion</legend>
				<table>
					<tr>
						<td> <label for="telCli1"> Numero de téléphone</label></td>
						<td><input type="tel" id="telCli1" name="telCli" placeholder="08877639" required><br/><span class="telCli"></span></td>
					</tr>
					<tr>
						<td> <label for="passCli1">Mot de passe</label> </td><td><input type="password" id="passCli1" name="passCli" required><br/><span class="passCli"></span></td>
					</tr>
				</table>
				<table style="margin-top:20px; width:100%;">
					<tr>
						<td><button><a href='javascript:history.back()'>retour </a></button></td>
						<td><a href="#" class="connexion1"><input type="submit" value="Confirmer"  class="connexion btn btn-primary"></a></td>
					</tr>
				</table>
			</fieldset>	
		</form>
<?php }

	function inscrire(){
?> 
		<form method="post" action="../controller/requeteClients.php?inscription=inscription">
			<fieldset class="field"><legend>Inscription</legend>
			
			<span class="passDifferent"> Les deux pass ne sont pas identiques</span>
				<table cellspacing="20">
					<tr>
						<td> <label for="nomCli">Nom<span style="color:red; font-size:16px"> *</span></label> </td>
						<td><input type="text" id="nomCli" name="nomCli"  required><br/><span class="nomCli"></span></td>
					</tr>
					<tr>
						<td> <label for="prenomCli">Prenom<span style="color:red; font-size:16px"> *</span></label></td>
						<td><input type="text" id="prenomCli" name="prenomCli"  required><br/><span class="prenomCli"></span></td>
					</tr>
					<tr>
						<td> <label for="emailCli">Email<span style="color:red; font-size:16px"> *</span></label></td>
						<td><input type="email" id="emailCli" name="emailCli" ><br/><span class="emailCli"></span></td>
					</tr>
					<tr>
						<td> <label for="telCli"> Numero de téléphone<span style="color:red; font-size:16px"> *</span></label></td>
						<td><input type="tel" id="telCli" name="telCli" placeholder="08877639" required><br/><span class="telCli"></span></td>
					</tr>
					<tr>
						<td> <label for="passCl">Mot de passe<span style="color:red; font-size:16px"> *</span></label> </td>
						<td><input type="password" id="passCli" name="passCli"required class="pass1"><br/><span class="passCli"></span></td>
					</tr>
					<tr>
						<td><label for="passCliConf">Confirmer votre mot de passe<span style="color:red; font-size:16px"> *</span></label> </td><td><input type="password" id="passCliConf" name="passCliConf" required class="pass2"><br/><span class="pass2Cli"></span></td>
					</tr>
					<tr>
					<td> <label for="adressCli">Adresse<span style="color:red; font-size:16px"> *</span></label> </td>
						<td><textarea type="textarea" id="adresseCli" name="adresseCli" placeholder="Daloa, Orly 2, à la Maternité" required></textarea><br/><span class="adresseCli"></span></td>
					</tr>
				</table>
				<table style="margin-top:20px; width:100%;">
					<tr>
						<td><button><a href='javascript:history.back()'>retour </a></button></td>
						<td><a href="#" class="inscription1"><input type="submit" value="Confirmer" class="btn btn-primary"></a></td>
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
?>