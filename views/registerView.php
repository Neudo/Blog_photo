<h1>Inscription</h1>

<form action="" method="POST">

  <label for="pseudo">Pseudo : </label>
  <input type="text" name="pseudo" id="pseudo" value="<?= isset($submittedPseudo) ? $submittedPseudo : "" ?>"> <br>

  <label for="email">Email : </label>
  <input type="email" name="email" id="email" value="<?= isset($submittedEmail) ? $submittedEmail : "" ?>"> <br> 

  <label for="password">Mot de passe :</label>
  <input type="password" name="password" id="password" value=""> <br>

  <label for="password">Confirmez le mot de passe :</label>
  <input type="password" name="password-confirmation" id="password-confirmation" value=""> <br>

  <label for="bio">Biographie :</label>
  <textarea name="bio" id="bio" cols="30" rows="5"></textarea>

  <button>S'inscrire</button>

  <?php if(!empty($errors)): ?> 
        <h3>Erreurs :</h3>
        <?php foreach($errors as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
    <?php endif; ?>


</form>