<?php
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
        <!--header-->
        <?php header_a_afficher();?>
        <!--header-->
        <!--section catégories-->
        <h1 class="title is-2">Ouvrir un ticket</h1>
        <div class="block" id="categorie">
            <div class="container about">
                <h2 class="subtitle">Sélectionnez une catégorie</h2>
                <div class="columns">
                    <div class="column is-one-quarter about-single-element"><button class="button is-warning" id="btn_Office365">Office365</button></div>
                    <div class="column is-one-quarter about-single-element"><button class="button is-danger" id="btn_APSchool">AP School</button></div>
                    <div class="column is-one-quarter about-single-element"><button class="button is-link" id="btn_Uniflow">Canon Uniflow</button></div>
                    <div class="column is-one-quarter about-single-element"><button class="button is-dark" id="btn_Intervention">Intervention technique</button></div>
                </div>
            </div>
        </div>
        <!--section catégorie-->
        <!--formulaire-->
        <div class="block" id="form-infos">
            <div class="form-ticket">
                <div class="container">
                    <form method="POST" id="formulaire" action="traitement.php">
                        <div class="columns">
                            <div class="column">
                                <div class="field">
                                    <label class="label">Prénom</label>
                                    <div class="control has-icons-left">
                                        <input class="input" name="prenom" id="box_prenom" type="text" placeholder="Votre prénom" minlength="2" maxlength="40" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Nom</label>
                                    <div class="control has-icons-left">
                                        <input class="input" name="nom" id="box_nom" type="text" placeholder="Votre nom" minlength="2" maxlength = "40" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Adresse e-mail</label>
                                    <div class="control has-icons-left">
                                        <input class="input" name="email" id="box_email" type="email" placeholder="Votre adresse e-mail" maxlength = "80" required>
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">N° de téléphone</label>
                                    <div class="control has-icons-left">
                                        <input class="input" name="tel" id="box_tel" type="tel" placeholder="Votre n° de téléphone" minlength="9" maxlength = "10">
                                        <span class="icon is-small is-left">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field">
                                    <label class="label">Type d'utilisateur</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="type_user" id="box_type_user" required>
                                                <option>Elève</option>
                                                <option>Parent</option>
                                                <option>Membre du personnel</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Catégorie</label>
                                    <div class="control">
                                        <div class="select is-fullwidth">
                                            <select name="categorie" id="box_cat" required>
                                                <option>Office365</option>
                                                <option>AP School</option>
                                                <option>Canon Uniflow</option>
                                                <option>Intervention technique</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Sujet</label>
                                    <div class="control">
                                        <input class="input" name="sujet" id="box_sujet" type="text" placeholder="Sujet" minlength="2" maxlength = "80" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Description du problème</label>
                            <div class="control">
                                <textarea class="textarea" name="msg" id="box_description" placeholder="Expliquez votre problème" maxlength = "300" required></textarea>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary" name="valider" id="btn_creer_ticket">Créer le ticket</button>
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="control">
                                        <button class="button is-primary" type="submit" name="annuler" id="btn_annuler">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--formulaire-->
        <!--footer-->
        <?php include ("includes/footer.php");?>
        <!--footer-->
    </body>
    <!--body-->
</html>
