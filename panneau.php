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
        ?>
            <!--header-->
            <?php header_a_afficher();?>
            <!--header-->
            <!--section etat tickets-->
            <h1 class="title is-2">Tickets</h1>
            <div class="block" id="etat-tickets">
                <div class="container about">
                    <h2 class="subtitle"></h2>
                    <form method="POST" id="form-etat">
                        <div class="columns">
                            <div class="column is-one-third about-single-element"><button class="button is-link is-outlined" name="ouvert" id="btn_ouvert">Ouvert</button></div>
                            <div class="column is-one-third about-single-element"><button class="button is-link is-outlined" name="en_traitement" id="btn_en_traitement">En traitement</button></div>
                            <div class="column is-one-third about-single-element"><button class="button is-link is-outlined" name="traite" id="btn_traite">Traité</button></div>
                        </div>
                    </form>
                </div>
            </div>
            <!--section etat tickets-->
            <!--tableau des tickets-->
            <div class="block" id="tableau-tickets">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Catégorie</th>
                            <th>Sujet</th>
                            <th>Contact</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Catégorie</th>
                            <th>Sujet</th>
                            <th>Contact</th>
                            <th>Message</th>
                        </tr>
                    </tfoot>
                    <?php
                    if(isset($_POST['ouvert']))
                    {
                        $tickets = $db->query("SELECT * FROM tickets WHERE etat='Ouvert' ORDER BY id DESC");
                        while ($tickets_ouverts = $tickets->fetch())
                        {
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <form method="POST" action="detail_ticket.php">
                                            <div class="control">
                                                <button class="button is-link" name="id" id="btn_id" type="text" value="<?php echo $tickets_ouverts['id'];?>"><?php echo $tickets_ouverts['id'];?></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td><?php echo $tickets_ouverts['date_ouverture'];?></td>
                                    <td><?php echo $tickets_ouverts['categorie'];?></td>
                                    <td><?php echo $tickets_ouverts['sujet'];?></td>
                                    <td><?php echo $tickets_ouverts['prenom'].' '.$tickets_ouverts['nom'];?></td>
                                    <td><?php echo $tickets_ouverts['msg'];?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                    }
                    if(isset($_POST['en_traitement']))
                    {
                        $tickets = $db->query("SELECT * FROM tickets WHERE etat='En traitement' ORDER BY id DESC");
                        while ($tickets_en_traitement = $tickets->fetch())
                        {
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <form method="POST" action="detail_ticket.php">
                                            <div class="control">
                                                <button class="button is-link" name="id" id="btn_id" type="text" value="<?php echo $tickets_en_traitement['id'];?>"><?php echo $tickets_en_traitement['id'];?></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td><?php echo $tickets_en_traitement['date_ouverture'];?></td>
                                    <td><?php echo $tickets_en_traitement['categorie'];?></td>
                                    <td><?php echo $tickets_en_traitement['sujet'];?></td>
                                    <td><?php echo $tickets_en_traitement['prenom'].' '.$tickets_en_traitement['nom'];?></td>
                                    <td><?php echo $tickets_en_traitement['msg'];?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                    }
                    if(isset($_POST['traite']))
                    {
                        $tickets = $db->query("SELECT * FROM tickets WHERE etat='Traite' ORDER BY id DESC");
                        while ($tickets_traites = $tickets->fetch())
                        {
                        ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <form method="POST" action="detail_ticket.php">
                                            <div class="control">
                                                <button class="button is-link" name="id" id="btn_id" type="text" value="<?php echo $tickets_traites['id'];?>"><?php echo $tickets_traites['id'];?></button>
                                            </div>
                                        </form>
                                    </td>
                                    <td><?php echo $tickets_traites['date_ouverture'];?></td>
                                    <td><?php echo $tickets_traites['categorie'];?></td>
                                    <td><?php echo $tickets_traites['sujet'];?></td>
                                    <td><?php echo $tickets_traites['prenom'].' '.$tickets_traites['nom'];?></td>
                                    <td><?php echo $tickets_traites['msg'];?></td>
                                </tr>
                            </tbody>
                        <?php
                        }
                    }
                ?>
                </table>
            </div>
            <!--tableau des tickets-->
            <!--footer-->
            <?php include ("includes/footer.php");?>
            <!--footer-->
        <?php
        }
        ?>
    </body>
    <!--body-->
</html>
