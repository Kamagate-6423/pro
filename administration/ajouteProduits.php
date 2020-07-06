
<fieldset><legend>Ajouter un produit</legend>
	<form method="post" action="requeteAjouteProduits.php" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
	
		<table>
			<tr>
				<td><label for="image1">Chair congelé </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr>
				<td><label for="identifiant">Identifiant</label></td>
				<td><input type="number" id="identifiant" name="identifiant"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit" value="Poulet de chair"/></td>
			</tr>
			<tr>
				<td><label for="chemin">Chemin Destination</label></td>
				<td><input type="text" id="chemin" name="chemin"></td>
			</tr>
			<tr>
				<td><label for="interPoids1">Intervalle de poids</label></td>
				<td><input type="text" id="interPoids1" name="PIntervalle"></td>
			</tr>
			<tr>
				<td><label for="poidsPrix1">Prix/poids</label></td>
				<td><input type="text" id="poidsPrix1" name="poidsPrix"></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="stock1">Stock ou Statu</label></td>
				<td><input type="text" id="stock1" name="stock" value="En Stock ou active"/></td>
			</tr>
			<tr>
				<td><label for="description1">Description</label></td>
				<td><textarea type="text" id="description" name="description"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id=1"><input type="submit" value="Soumettre"></a></td>
			</tr>
		</table>
	</form>
</fieldset>