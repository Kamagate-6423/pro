<fieldset><legend>Supprimer un produit</legend>
	<form method="post" action="requetesSupprimer.php" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<table>
			<tr>
				<td><label for="identifiant">Identifiant</label></td>
				<td><input type="number" id="identifiant" name="identifiant"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit"/></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id=1"><input type="submit" value="Supprimer le produit"></a></td>
			</tr>
		</table>
	</form>
</fieldset>
