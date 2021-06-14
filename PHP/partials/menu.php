<header>

<div class="burger">
    <div></div>
    <div></div>
    <div></div>
</div>

<a class="logo-mobile" href="index.php"><img src="assets/img/logo-amp.png" alt="logo AMP"></a>

    <nav>
        <div class="desktop-bar">
            <div class="left"><a class="logo" href="index.php"><img src="assets/img/logo-amp.png" alt="logo AMP"></a></div>
            <div class="right">
                <a class="slide-line" href="index.php?page=gallery&action=listGallery">Thèmes</a>
                <a class="slide-line" href="index.php?page=posts">Le Blog</a>
                <a class="slide-line" href="index.php?page=bio">Biographie</a>
                <a class="slide-line" href="index.php?page=contact">Contact</a>
                <?php if(!isset($_SESSION['user'])): ?>
                    <div class="menu-account">
                        <a class="icon-account" href="#"><img src="assets/img/various/account.png" alt=""></a>
                            <div class="menu-options">
                                <a class="slide-line" href="index.php?page=user&action=register"> S'inscrire </a><br>
                                <a class="slide-line" href="index.php?page=user&action=login"> Connexion </a>
                            </div>
                    </div>
                    <?php else: ?>
                        <?php if($_SESSION['user']['is_admin'] == 1): ?>
                            <a class="slide-line" href="./admin">Administration</a>
                            <a class="slide-line" href="index.php?page=user&action=logout">Déconnexion</a>
                        <?php else : ?>
                        <a class="icon-account" href="#"><img src="assets/img/various/account.png" alt=""></a>
                            <div class="menu-options">
                                <a class="slide-line" href="index.php?page=user&action=edit">Mon compte</a>
                                <a class="slide-line" href="index.php?page=user&action=logout">Déconnexion</a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
