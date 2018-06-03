<?php
//Fonction pour déterminer quelle en-tête afficher selon le visiteur
function header_a_afficher()
{
	if (isset($_SESSION['user']))
		{
			include("header_admin.php");
		}
	else include("header.php");
}
?>