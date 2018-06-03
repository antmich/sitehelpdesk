<?php
session_start();
include_once("includes/fonctions.php");
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
        <?php
        if (isset($_SESSION['user']))
        {
            include ("includes/connexion_db.php");
            if (isset($_SESSION['id_ticket']))
            {
                $id_ticket = $_SESSION['id_ticket'];
                $ticket = $db->query("SELECT * FROM tickets WHERE id=$id_ticket");
                while ($infos_ticket = $ticket->fetch())
                {
                    $prenom = $infos_ticket['prenom'];
                    $nom = $infos_ticket['nom'];
                    $email = $infos_ticket['email'];
                    $tel = $infos_ticket['tel'];
                    $type_user = $infos_ticket['type_user'];
                    $categorie = $infos_ticket['categorie'];
                    $sujet = $infos_ticket['sujet'];
                    $msg = $infos_ticket['msg'];
                    $date = $infos_ticket['date_ouverture'];
                    $etat = $infos_ticket['etat'];
                }
                $admin = $_SESSION['user'];
                $reponse_ticket = $db->query("SELECT * FROM reponse_admin INNER JOIN admins ON reponse_admin.ref_admins = admins.id INNER JOIN tickets ON reponse_admin.ref_tickets = tickets.id WHERE user='$admin' AND ref_tickets=$id_ticket");
                while ($reponse_t = $reponse_ticket->fetch())
                {
                    $reponse_admin = $reponse_t['reponse'];
                }
            }
        ?>
            <!--header-->
            <?php header_a_afficher();?>
            <!--header-->
            <!--section infos ticket-->
            <h1 class="title is-2">Détails du ticket</h1>
            <?php
            if(isset($_POST['id']))
            {
                $id_ticket = $_SESSION['id_ticket'] = $_POST['id'];
                $ticket = $db->query("SELECT * FROM tickets WHERE id=$id_ticket");
                while ($infos_ticket = $ticket->fetch())
                {
                    $prenom = $infos_ticket['prenom'];
                    $nom = $infos_ticket['nom'];
                    $email = $infos_ticket['email'];
                    $tel = $infos_ticket['tel'];
                    $type_user = $infos_ticket['type_user'];
                    $categorie = $infos_ticket['categorie'];
                    $sujet = $infos_ticket['sujet'];
                    $msg = $infos_ticket['msg'];
                    $date = $infos_ticket['date_ouverture'];
                    $etat = $infos_ticket['etat'];
                }
                $admin = $_SESSION['user'];
                $reponse_ticket = $db->query("SELECT * FROM reponse_admin INNER JOIN admins ON reponse_admin.ref_admins = admins.id INNER JOIN tickets ON reponse_admin.ref_tickets = tickets.id WHERE user='$admin' AND ref_tickets=$id_ticket");
                while ($reponse_t = $reponse_ticket->fetch())
                {
                    $reponse_admin = $reponse_t['reponse'];
                }
            }
            ?>
            <div class="block" id="detail">
                <div class="container">
                    <table class="table is-fullwidth" id="detail_1">
                        <tbody>
                            <tr>
                                <td><?php echo 'Ticket : ' . $id_ticket?></td>
                                <td><?php echo $etat?></td>
                                <td><?php echo 'Ticket créé le : ' . $date?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="block" id="detail">
                <div class="container">
                    <div class="columns">
                        <div class="column is-three-quarters">
                            <div class="block" id="infos">
                                <table class="table is-fullwidth">
                                    <tbody>
                                        <tr>
                                            <td><?php echo 'Sujet : ' . $sujet?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'De : ' . $prenom . $nom?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Email : ' . $email?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Utilisateur : ' . $type_user?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo 'Catégorie : ' . $categorie?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="columnn is-one-quarter">
                            <div class="block" id="btn_chg_etat">
                                <h2 class="subtitle">Changer l'état du ticket</h2>
                                <form method="POST" action="">
                                    <div class="control">
                                        <button class="button is-link" name="ouvert" id="btn_chg">Ouvert</button><br>
                                        <button class="button is-link" name="en_traitement" id="btn_chg">En traitement</button><br>
                                        <button class="button is-link" name="traite" id="btn_chg">Traité</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($_POST['ouvert']))
            {
                $db->exec("UPDATE tickets SET etat='Ouvert' WHERE id=$id_ticket");
                header("refresh:0");
            }
            if(isset($_POST['en_traitement']))
            {
                $db->exec("UPDATE tickets SET etat='En traitement' WHERE id=$id_ticket");
                header("refresh:0");
            }
            if(isset($_POST['traite']))
            {
                $db->exec("UPDATE tickets SET etat='Traite' WHERE id=$id_ticket");
                header("refresh:0");
            }
            ?>
            <div class="block" id="detail">
                <div class="container about">
                    <h2 class="subtitle">Description du problème : </h2>
                    <textarea class="textarea" type="text" readonly><?php echo $msg?></textarea>
                    <?php
                    if ($reponse_t['reponse'] != "")
                    {
                    ?>
                        <div id="reponse_envoye">
                            <hr>
                            <h2 class="subtitle">Réponse envoyée par <?php echo $admin?> : </h2>
                            <textarea class="textarea" type="text" readonly><?php echo $reponse_t['reponse']?></textarea>
                            <hr>
                        </div>
                    <?php
                    }
                    else 
                    {?>
                        <hr>
                    <?php    
                    }?>
                    <form method="POST" id="reponse" action="">
                        <h2 class="subtitle">Répondre : </h2>
                        <textarea class="textarea" name="textarea_reponse" type="text"></textarea>
                        <hr>
                        <label class="checkbox">
                            <input type="checkbox" name"checkbox_etat" id="chg_etat"> Changer l'état du ticket</input>
                        </label>
                        <div id="radio_etat" hidden>
                            <label class="radio">
                                <input type="radio" name="turn_en_traitement" id="radio_en_traitement"> En traitement</input>
                            </label>
                            <label class="radio">
                                <input type="radio" name="turn_traite" id="radio_traite"> Traité</input>
                            </label>
                        </div>
                        <div class="control">
                            <button class="button is-link" name="reponse" id="btn_reponse">Répondre</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['reponse']))
            {
                if(!empty($_POST['textarea_reponse'])
                {
                    if (isset($_POST['checkbox_etat']))
                    {
                        if (isset($_POST['turn_en_traitement']))
                        {
                            $req = $db
                        }
                        else
                        {

                        }
                    }
                }
            }
            ?>
            <!--section infos ticket-->
            <!--footer-->
            <?php include ("includes/footer.php");?>
            <!--footer-->
        <?php
        }
        ?>
    </body>
    <!--body-->
</html>