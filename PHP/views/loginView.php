<img class="bg-login" src="assets/img/various/cocci.jpg" alt="">
    <div class="container-login">
        <h1>Déjà inscrit ? Connecter vous</h1> <br>
    
            <form action="" method="POST">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" value=""> <br>
                <label for="password">Mot de passe</label><br>
                <input type="password" name="password" id="password" value=""> <br>
                <button>Connexion</button>
            </form>
    
            <?php if(!empty($errors)): ?>
                <h3>Erreurs :</h3>
                <?php foreach($errors as $error): ?>
                    <?= $error ?><br>
                <?php endforeach; ?>
            <?php endif; ?>
        </form>
    </div>
</div>