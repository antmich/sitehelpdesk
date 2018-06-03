<?php
session_start();
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
        <div class="loginbox">
            <div class="cadre">
                <img src="src/img/logo.png" class="logo-ecole">
                <h3 class="title is-3">Connectez-vous</h3>
                <form method="POST" id="connexion" action="connexion_suite.php">
                    <div class="field">
                        <label class="label">Utilisateur</label>
                        <div class="control has-icons-left">
                            <input class="input" name="user" id="user" type="text" placeholder="Nom d'utilisateur" minlength="2" maxlength="40" autofocus required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user-circle"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mot de passe</label>
                        <div class="control has-icons-left">
                            <input class="input" name="password" id="password" type="password" placeholder="Mot de passe" minlength="2" maxlength="40" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-link" name="connexion" id="btn_connexion">Se connecter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <!--body-->
</html>