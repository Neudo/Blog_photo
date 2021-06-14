<h2><?= ($action == 'new') ? 'Ajout' : 'Modification';?> d'un utilisateur </h2>

<?php if(!empty($errors)): ?>
        <h3>Erreurs :</h3>
        <?php foreach($errors as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
<?php endif; ?>

<form action="" method="POST">

    <label for="name">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" value="<?= isset($selectedUser) ? $selectedUser['pseudo']:($submitedPseudo ??''); ?>"> <br>

    <label for="name">Email</label>
    <input type="text" name="email" id="email" value="<?= isset($selectedUser) ? $selectedUser['email']:($submitedEmail ??''); ?>"> <br>

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" value=""> <br>

    <label for="is_admin">Admin ?</label>
    <select name="is_admin" id="is_admin">
    <option value="no">Non</option>
    <option value="yes">Oui</option>
    </select> <br>


    <button>Sauvegarder</button>
</form>

<!-- modifier les values pour mettre les bonnes -->