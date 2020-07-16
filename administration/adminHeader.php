<?php session_start(); 

if(!empty($_SESSION['client']['nomAdministrateur'])){
?>
	<!doctype html>
	<html lang="fr">
	  <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>vente de poulets</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
		<link rel="stylesheet" href="../public/css/style.css">
		<link rel="stylesheet" href="../public/css/bootstrap.css">
		<link rel="stylesheet" href="../public/css/alertify.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
		<link rel="stylesheet" href="../public/css/default">
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	  </head>
	  <body >
		<div class="corp">
			<div class="container-fluid sociaux">
				<div class="col-xs-4 col-sm-3 col-md-2 col-lg-3 ">
					<div class="col-sm-6 col-md-6 col-lg-6"><a href="../controller/detruireSession.php" class="btn btn-warning">Déconnecter</a></div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <?=$_SESSION['client']['nomAdministrateur']?> <?=$_SESSION['client']['prenomAdministrateur']?> </div>
				<div class="col-xs-4 col-sm-5 col-md-6 col-lg-5 "> 
					<div>Vendredi le 13 septembre 2019</div>
				</div>
			</div>
			   <header class="container-fluid">
					<div class="hidden-xs col-sm-2 col-md-3 col-lg-2"><img src="../public/image/logo.jpg" class="img-responsive"> </div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6"><h4>Poulet</h4><h1>KAMSA</h1></div>
					<div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
						<div class="panel panel-default" style="height:100px">
							<div class="panel-heading">ADMINISTRATEUR</div>
							<div class="panel-body">
								<?=$_SESSION['client']['nomAdministrateur']?> <?=$_SESSION['client']['prenomAdministrateur']?>
							</div>
						</div>
					</div>
				</header>
				
				<nav class="navbar navbar-default" id="nav">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="adminHeader.php">Accueil</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li class="dropdown">
						  <a href="?admin=commande" class="dropdown-toggle" role="button">Commandes</a>
						</li>
						<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produits <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="?admin=metAJourProduits">Mettre produits à jour</a></li>
							<li><a href="?admin=ajouteProduits">Ajouter produits</a></li>
							<li><a href="?admin=supprimerPro">Supprimer produits</a></li>
						  </ul>
						</li>
						<li>
						  <a href="?admin=listeClients" class="dropdown-toggle"role="button">Clients </a>
						</li>	
						<li>
						  <a href="?admin=passeAdmin" class="dropdown-toggle"role="button">passe oublier</a>
						</li>	
					 </ul>
					  <form class="navbar-form navbar-right">
						<div class="form-group">
						  <input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">OK</button>
					  </form>
						
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
				
		<?php if(isset($_SESSION['adminAlert'])){ ?>
					<div class="alert alert-success adminAlert1" style="text-align:center;"><?=$_SESSION['adminAlert']?><span class=" btn btn-danger glyphicon glyphicon-remove" id="adminAlert1" style="margin-left:10%"></span></div>
		<?php 	} ?>
			
			<?php
				if(isset($_GET['admin'])&& $_GET['admin']=='metAJourProduits'){
					include('metAJourProduits.php');
				}else if(isset($_GET['admin'])&& $_GET['admin']=='metAJourProduits1'){
					include('metAJourProduits.php');
				}else if(isset($_GET['admin'])&& $_GET['admin']=='ajouteProduits'){
					include('ajouteProduits.php');
				}else if(isset($_GET['admin'])&& $_GET['admin']=='listeClients'){
					include('listeClients.php');
				}else if(isset($_GET['admin'])&& $_GET['admin']=='supprimerPro'){
					include('supprimerPro.php');
				}else if(isset($_GET['admin'])&& $_GET['admin']=='passeAdmin'){
					include('passeAdmin.php');
				}else if(isset($_POST['changePasse']) || (isset($_POST['identifiant']) && isset($_POST['passe'])) || isset($_GET['newpass'])){
					include('passeAdmin.php');
				} else{
				include('listeCommandes.php');
				}
			?>
	  
		<footer class="container-fluid">
			<table>
				<thead>
					<tr>
						<th>Autres Volailles</th>
						<th>Partenaires</th>
						<th>R.Sociaux</th>
						<th>Adresse</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><div><a href="#">Pintadres</a></div></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">IvoGrain</div><div class="col-xs-12 col-sm-2 col-md-4 col-lg-6"><img src="../public/image/ivograin_icon.jpg" alt="" class="img-responsive"/></div></a></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">Facebook</div><div class="col-xs-12 col-sm-3 col-md-4 col-lg-6 "><img src="../public/image/face_icon.png" alt="" class="img-responsive" /></div></a></td>
						<td><h6>kelm6423@gmail.com<h6><a href="mailto:kelm6423@gmail.com">Clique ici</a> pour envoyer un message</td>
					</tr>
					<tr>
						<td><div><a href="#">Dindons</a></div></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">Foani</div><div class="col-xs-12 col-sm-5 col-md-4 col-lg-6"><img src="../public/image/foani_icon.png" alt="" class="img-responsive" /></div></a></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">YouTube</div><div class="col-xs-12 col-sm-3 col-md-4 col-lg-6"><img src="../public/image/youtube_icon.png" alt="" class="img-responsive" /></div></a></td>
						<td><div><h6>00225 08-87-76-39</h6><a href="tel:0022508877639">Clique ici</a> pour lancer l'appel</div><br/></td>
					</tr>
					<tr>
						<td><div><a href="#">Canards</a></div></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">CoqIvoire</div><div class="col-xs-12 col-sm-5 col-md-4 col-lg-6"><img src="../public/image/coqivoire_icon.png" alt="" class="img-responsive" /></div></a></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">Twitter</div><div class="col-xs-12 col-sm-3 col-md-4 col-lg-6"><img src="../public/image/twitter_icon.png" alt="" class="img-responsive" /></div></a></td>
						<td><div><a href="#">Daloa, quartier orly</a></div></td>
					</tr>
					<tr>
						<td><div><a href="#">Pijons</a></div></td>
						<td></td>
						<td><a href="#"><div class="hidden-xs col-sm-7 col-md-7 col-lg-6">Linkedin</div><div class="col-xs-12 col-sm-3 col-md-4 col-lg-6"><img src="../public/image/linkedin_icon.jpg" alt="" class="img-responsive" /></div></a></td>
						<td></td>
					</tr>
				
				</tbody>
			</table>
		</footer>
		</div>
	   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="../public/js/jquery-3.4.1.js"></script>
		
		<script type="text/javascript" src="../public/js/script.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../public/css/js.js"></script>
	  </body>
	</html>
<?php 
			unset($_SESSION['adminAlert']);
}else{
	header('location:../view/client.php');
} ?>
  