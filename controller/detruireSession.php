<?php
session_start();


if(isset($_GET['ok'])){ // Lorsqu'une personne valide sa commande 
	unset($_SESSION['panier']);
	unset($_SESSION['commander']);
	unset($_SESSION['compt']);
}else{ // Lorsqu'une personne se deconnecte
	session_destroy();
}

header("Location:../index.php");