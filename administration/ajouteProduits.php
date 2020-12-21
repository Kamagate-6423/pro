
<fieldset><legend>Ajouter un produit</legend>
	<form method="post" action="requeteAjouteProduits.php" enctype="multipart/form-data" class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
	
		<table>
			<tr>
				<td><label for="image1">Image </label></td>
				<td><input type="file" id="image1" name="image"/></td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Catégorie</label></td>
				<td>
					<select id="categorie" name="categorie">
						<option value="carrousel">Carrousel</option>
						<option value="Pchair">Poulet de chair</option>
						<option value="Mchair">Morceau de poulet</option>
						<option value="Ppondeuse">Poulet pondeuse</option>
						<option value="cokele" >Côkélé</option>
						<option value="Pafricain">Poulet africain</option>
						<option value="pintade" >Pintadre</option>
						<option value="canard" >Canard</option>
						<option value="boeuf">Boeuf</option>
						<option value="mouton" >Mouton</option>
						<option value="bouc">Bouc</option>
						<option value="poisson" >Poisson</option>
						<option value="oeuf" >Oeuf</option>
						<option value="condiment">Condiments</option>
					</select>
				</td>
			</tr>
			<tr style="margin-bottom:5px">
				<td><label for="nomProduit">Nom du produit</label></td>
				<td><input type="text" id="nomProduit" name="nomProduit"/></td>
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
				<td><label for="stock">En stock</label><input type="radio" id="stock" name="stock" value="En Stock"></td>
				<td><label for="pasStock">Stock epuisé</label><input type="radio" id="pasStock" name="stock" value="Stock epuisé"></td>
			</tr>
			<tr>
				<td><label for="description1">Description</label></td>
				<td><textarea type="text" id="description" name="description"></textarea></td>
			</tr>
			<tr>
				<td><label for="motCle">Mots clés</label></td>
				<td><textarea type="text" id="motCle" name="motCle"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="?id=1"><input type="submit" value="Soumettre"></a></td>
			</tr>
		</table>
	</form>
</fieldset>