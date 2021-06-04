<p class="contact-text">
    Une question ? Un avis ou tout autre chose ? <br> N’hésitez pas à me posez toutes vos questions ! <br> Vous pouvez utiliser le formulaire de contact ci-dessous ou m’envoyer <br> Mail : contact@accroc-macro-photo.fr
</p>

    <form class="container-contact" action="" method="POST">
        <div class="test-label">
            <label  for="firstname">Prénom</label>
            <input class="firstname-form" type="text" id="firstname" name="firstname" value="<?= (isset($firstname) && !empty($errors)) ? $firstname : "" ?>"> <br>
        </div>
        <div class="test-label">
            <label for="lastname">Nom</label>
            <input class="lastname-form" type="text" id="lastname" name="lastname" required value="<?= (isset($lastname) && !empty($errors)) ? $lastname : "" ?>"> <br>
        </div>
        <label for="e-mail">Votre adresse e-mail</label>
        <input class="email-form" type="text" id="e-mail" name="e-mail" required value="<?= (isset($email) && !empty($errors)) ? $email : "" ?>"> <br>
        <label for="object">Sujet du message : </label>
        <input class="object-form" type="text" id="object" name="object" required value="<?= (isset($object) && !empty($errors)) ? $object : "" ?>"> <br>
        <label for="content">Votre message :</label>
        <textarea class="content-form" name="content" id="content" cols="30" rows="3" required><?= (isset($content) && !empty($errors)) ? $content : "" ?></textarea>
        <button class="send-form">Envoyer</button>
    </form>

    <?php if(empty($errors) && !empty($_POST)): ?>
        <h2>Merci <?= $lastname; ?>, votre message à bien été envoyé !</h2>
    <?php endif; ?>

    
    <?php if(!empty($errors)): ?>
        <h3>Erreurs :</h3>
        <?php foreach($errors as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
    <?php endif; ?>

