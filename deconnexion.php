<?php 
	session_start();
	//On efface les variables de session
	$_SESSION = array();
	//On redirige vers la page de connexion
	header("Location: login.php");
?>