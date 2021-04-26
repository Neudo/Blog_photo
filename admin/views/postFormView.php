<h2><?= ($action == 'new') ? 'Publier' : 'Modification'; ?> d'un article</h2>

<?php if(!empty($errors)): ?>
        <h3>Erreurs :</h3>
        <?php foreach($errors as $error): ?>
            <?= $error ?><br>
        <?php endforeach; ?>
<?php endif; ?>

<form action="" method="POST" enctype="multipart/form-data">

    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?= isset($selectedPost) ? $selectedPost['title']:($title ??''); ?>"> <br>

    <label for="summary">Résumé</label>
    <textarea name="summary" id="summary" cols="30" rows="5"><?= isset($selectedPost) ? $selectedPost['summary']:($summary ??'');?></textarea> <br>
   
    <label for="content">Contenu</label>
    <textarea name="content" id="content" cols="50" rows="20"><?= isset($selectedPost) ? $selectedPost['content']:($content ??''); ?></textarea> <br>

    <label for="image">Image principale</label>
    <input type="file" name="image" id="image"> <br>
    (extensions autorisées : jpeg, jpg, png et gif) (taille maxi : 2MO)
    <br>
    <?php if($action == 'edit') : ?>
    <img src="../assets/img/posts/<?= $selectedPost['img'];?>" alt="<?=$selectedPost['title'];?>"> 
    <?php endif; ?>
    
    <br>

    <label for="category">Catégorie(s)</label>
    <select name="category" id="category" multiple>
        <?php foreach($categories as $category): ?>	
            <option value=""><?= $category['name'];?></option>
        <?php endforeach; ?>
    </select>

<p>Maintenez "CTRL" pour selectionner plusieurs catégories.</p>

<label for="is_publied">Publier ?</label>
    <select name="is_publied" id="is_publied">
    <option value="no">Non</option>
    <option value="yes">Oui</option>
    </select>


    <button>Sauvegarder</button>
</form>