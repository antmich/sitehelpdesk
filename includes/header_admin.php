<div class="block">
    <header class="header">
        <a href="index.php" class="header-logo"><img src="src/img/logo.png" alt="Logo de l'école"></a>
        <nav class="header-menu">
            <div id="msg_connecte">
                <?php echo 'Connecté en tant que ' . $_SESSION['user']?>
            </div>
            <div id="btn_deconnexion">
                <a href="deconnexion.php">Déconnexion</a>
            </div>
        </nav>
    </header>
</div>