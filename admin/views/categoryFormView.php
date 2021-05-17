<h2><?= ($action == 'new') ? 'Ajout' : 'Modification';?> d'une catégorie </h2>

<?php if(!empty($errors)): ?>
        <h3>Erreurs :</h3>
        <?php foreach($errors as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data"> 

    <label for="name">Nom</label>
    <input type="text" name="name" id="name" value="<?= isset($selectedCategory) ? $selectedCategory['name']:($submitedDesription ??''); ?>"> <br>

    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="5"><?= isset($selectedCategory) ? $selectedCategory['description']:($submitedDesription ??''); ?></textarea> <br>

    <label for="image">Image</label>
    <input type="file" name="image" id="image"> <br>
    (extensions autorisées : jpeg, jpg, png et gif) (taille maxi : 2MO)
    <br>
    <?php if($action == 'edit') : ?>
    <img src="../assets/img/categories/<?= $selectedCategory['img'];?>" alt="<?=$selectedCategory['name'];?>"> 
    <?php endif; ?>
    
    <br>

    <button>Sauvegarder</button>
</form>