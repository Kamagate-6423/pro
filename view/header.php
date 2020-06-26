<?php
	
	include('../controller/requetePanier.php');
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
		<div class="container-fluid sociaux" style="padding-left:0px; padding-right:0px">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 " style="padding-left:0px">
				
				
				<?php if(isset($_SESSION['connexion'])){ ?>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<a class="btn btn-warning" style="height:30px" href="../controller/detruireSession.php" class="deconnecter">Deconnecter</a>
				</div>
				<?php }else{  ?>
				<div class=" col-sm-4 col-md-6 col-lg-6"><a class="btn btn-warning" style="height:30px; font-weight:bold" 	href="../view/client.php?inscrire=inscrire" >Inscrivez-vous</a>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					<a class="btn btn-warning" style="height:30px; font-weight:bold;" href="../view/client.php?connecter=connecter" >Connexion</a>
				</div>
				<?php } ?>
				
			</div>
<?php if(!empty($_SESSION['client']['nomCli'])){ ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 " style="text-align:center"><?=$_SESSION['client']['nomCli'];?> 
			<?=$_SESSION['client']['prenomCli'];?></div>
<?php }else{ ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align:center"> Nom et Prénom du client</div>
<?php } ?>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 " style="padding-right:0px;"> 
				<div class="col-sm-7 col-md-6 col-lg-6"><a href="../view/panier.php" class="btn btn-warning" 			style="height:30px; font-weight:bold" ><span class="glyphicon  glyphicon-shopping-cart"></span> Panier</a>:<span id="compt"><?=$panier->compt()?><span style="color:orange" >Kg</span></span>
				</div>
				<div class="col-sm-5 col-md-6 col-lg-6">Total:<span id="total"><?=$panier->total()?>					 	<span style="color:orange">fcfa</span></span></br>
						<a href="../view/panier.php" class="btn btn-primary">Voir votre commande</a>
						
				</div>
			</div>
		</div>

		   <header class="container-fluid">
				<div class="hidden-xs col-sm-2 col-md-3 col-lg-2"><img src="../public/image/logo.jpg" class="img-responsive"> </div>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6"><h1>De La Chair Fraîche</h1></div>
				<div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
					<div class="panel panel-default" style="height:100px">
						<div class="panel-heading">Contacts</div>
						<div class="panel-body">
							0022508877639 / 0022564230411
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
				  <a class="navbar-brand" href="../index/index.php">Accueil</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Poulets<span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="../index/index.php?menu1=pouletsMortsChairs">Poulets de chair</a></li>
						<li><a href="../index/index.php?menu1=pouletsMortsPondeuses">Poulets pondeuses</a></li>
					  </ul>
					</li>
					<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bétails <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<li><a href="../index/index.php?menu2=pouletsVivantsChairs">Bœuf</a></li>
						<li><a href="../index/index.php?menu2=pouletsVivantsPondeuses">Mouton</a></li>
						<li><a href="../index/index.php?menu2=pouletsVivantsCokeles">Chèvre</a></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a href="../index/index.php?menu3=oeufsPondeuses" class="dropdown-toggle" role="button">Poissons</a>
					</li>
					<li>
					  <a href="../index/index.php?menu4=poussinsChairs" class="dropdown-toggle"role="button">Poussins
					  </a>
					  
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

  