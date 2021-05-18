<div class="container-login">
    <h1>Connecter vous</h1>
    <form action="" method="POST">
    
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value=""> <br>
    
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" value=""> <br>
    
        <button>Connexion</button>
    
        <?php if(!empty($errors)): ?>
            <h3>Erreurs :</h3>
            <?php foreach($errors as $error): ?>
                <?= $error ?><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </form>
</div>
