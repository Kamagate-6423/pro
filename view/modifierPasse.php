
<?php
		if(isset($_SESSION['votrePasse']) && $_SESSION['votrePasse']!=""){
			echo'<div id="message" class="alert alert-success message" role="alert"><strong>'.$_SESSION['votrePasse'].'</strong></div>';
		}else if(isset($_SESSION['votrePasse1']) && $_SESSION['votrePasse1']!=""){
			echo'<div class="alert alert-warning message" role="alert" ><strong>'.$_SESSION['votrePasse1'].'</strong></div>';
		}
?>
<div class="form">
			<form method="post" action="../view/client.php" role="form" class="motDePassChanger">
			
				<fieldset class="field"><legend>Changer le mot de passe</legend>
				<div id="passe2DifPasse3" class="passDifferent" >Les deux mots de passes ne sont pas identiques</div>
				<div style="text-align:center">Remplir ces champs pour modifier votre mot de passe</div>
					<table>
						<tr>
							<td> <label for="tel1"> Numero de téléphone</label></td>
							<td><input type="tel" id="tel1" name="tel1" placeholder="08877639" maxlength="13" required><br/><span class="help-inline tel1"></span></td>
						</tr>
						<tr>
							<td> <label for="passe1">mot de passe</label> </td>
							<td>
								<input type="password" id="passe1" name="passe1" maxlength="16" required><br/><span class="passe1"></span>
							</td>
						</tr>
						<tr>
							<td> <label for="passe2">Nouveau mot de passe</label> </td><td><input type="password" id="passe2" name="passe2" maxlength="16" required ><br/><span class="passe2"></span></td>
						</tr>
						<tr>
							<td> <label for="passe3"> Confirmer le nouveau</label></td>
							<td><input type="password" id="passe3" name="passe3" placeholder="08877639" maxlength="16" required><br/><span class="help-inline passe3"></span></td>
						</tr>
					</table>
					<table style="margin-top:20px; width:100%;">
						<tr>
							<td colspan="2"><a href="#" class="passChange"><input type="submit" value="Confirmer"  class="passChange btn btn-primary" style="margin-left:50%"></a></td>
						</tr>
					</table>
				</fieldset>	
			</form>
			</div>