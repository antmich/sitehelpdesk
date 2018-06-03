<?php 
if(isset($_POST['valider']))
{
    include ("includes/connexion_db.php");
    $prenom = htmlspecialchars($_POST["prenom"]);
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    if (!empty($_POST["tel"]))
    {
        $tel = $_POST["tel"];
    }
    else 
    {
        $tel = "0";
    }
    $type_user = $_POST["type_user"];
    $categorie = $_POST["categorie"];
    $sujet = htmlspecialchars($_POST["sujet"]);
    $msg = htmlspecialchars($_POST["msg"]);
    if(!empty($_POST["prenom"]) AND !empty($_POST["nom"]) AND !empty($_POST["email"]) AND !empty($_POST["sujet"]) AND !empty($_POST["msg"]))
    {
        $req = $db->prepare("INSERT INTO tickets(prenom, nom, email, tel, type_user, categorie, sujet, msg, date_ouverture, etat) VALUES(?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), ?)");
        $req->execute(array($prenom, $nom, $email, $tel, $type_user, $categorie, $sujet, $msg, "Ouvert"));
        header ('Location : index.html');
    }
}
?>
<!DOCTYPE HTML>
<html>
    <!--head-->
    <head>
        <?php include ("includes/head.php");?>
    </head>
    <!--head-->
    <!--body-->
    <body>
        <!--header-->
        <?php include ("includes/header.php");?>
        <!--header-->
        <!--message de confirmation-->
        <h1 class="title is-2">Ouvrir un ticket</h1>
        <!--Notification après création du ticket-->
        <div class="notification is-link" id="notif">
            <button class="delete" id="close_notif"></button>
            Votre demande a bien été transmise et un email récapitulatif vous a été envoyé
        </div>
        <!--Notification après création du ticket-->
        <!--footer-->
        <?php include ("includes/footer.php");?>
        <!--footer-->
    </body>
</html>
