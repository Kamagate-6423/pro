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


		<form method="post" action="../controller/requeteClients.php?connexion=connexion" class="connexion">
			<fieldset class="field"><legend>Connexion</legend>
				<table>
					<tr><td> <label for="telCli1"> Numero de téléphone</label></td><td><input type="tel" id="telCli1" name="telCli" placeholder="08877639" required></td></tr>
					<tr><td> <label for="passCli1">Mot de passe</label> </td><td><input type="password" id="passCli1" name="passCli" required></td></tr>
				</table>
				<table style="margin-top:20px; width:100%;">
				<tr><td><button><a href='javascript:history.back()'>retour </a></button></td><td><a href="#"><input type="submit" value="Confirmer"  class="connexion btn btn-primary"></a></td></tr>
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
					<tr><td> <label for="nomCli">Nom</label> </td><td><input type="text" id="nomCli" name="nomCli"  required></td></tr>
					<tr><td> <label for="prenomCli">Prenom</label> </td><td><input type="text" id="prenomCli" name="prenomCli"  required></td></tr>
					<tr><td> <label for="emailCli">Email</label> </td><td><input type="email" id="emailCli" name="emailCli" ></td></tr>
					<tr><td> <label for="telCli"> Numero de téléphone</label></td><td><input type="tel" id="telCli" name="telCli" placeholder="08877639" required></td></tr>
					<tr><td> <label for="passCl">Mot de passe</label> </td><td><input type="password" id="passCli" name="passCli"required class="pass1"></td></tr>
					<tr><td> <label for="passCliConf">Confirmer votre mot de passe</label> </td><td><input type="password" id="passCliConf" name="passCliConf" required class="pass2"></td></tr>
					<tr><td> <label for="adressCli">Adresse</label> </td><td><textarea type="textarea" id="adresseCli" name="adresseCli" placeholder="Daloa, Orly 2, à la Maternité" required></textarea></td></tr>
				</table>
				<table style="margin-top:20px; width:100%;">
				<tr><td><button><a href='javascript:history.back()'>retour </a></button></td><td><a href="#"><input type="submit" value="Confirmer" class="btn btn-primary"></a></td></tr>
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