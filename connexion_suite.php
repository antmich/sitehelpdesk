<?php
session_start();
include_once("includes/fonctions.php");
if(isset($_POST['connexion']))
{
    include ("includes/connexion_db.php");
    $user = htmlspecialchars($_POST["user"]);
    $password = htmlspecialchars($_POST["password"]);
    if(!empty($_POST["user"]) AND !empty($_POST["password"]))
    {
        $requser = $db->prepare('SELECT * FROM admins WHERE user = ? AND password = ?');
		$requser->execute(array($user, $password));
		$userexist = $requser->rowCount();
		if ($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['user'] = $userinfo['user'];
			header("Location: panneau.php");
		}
		else
		{
            $erreur = "Mauvais pseudo et/ou mot de passe";
            header("Location: login.php");
		}
    }
}
?>