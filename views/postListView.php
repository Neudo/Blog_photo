    <header>
        <?php if(isset($selectedCategory)): ?>
            <h1><?= $selectedCategory['name'] ?></h1>
            <p><?= $selectedCategory['description'] ?></p>
            <img src="assets/img/categories/<?= $selectedCategory['img'];?>" alt="<?=$selectedCategory['name'];?>">
        <?php else: ?>
            <h1>Derniers articles</h1>
        <?php endif; ?>
    </header>

    <?php if(count($posts) > 0): ?>
        <?php foreach($posts as $post): ?>
        <article>
            <a href="index.php?page=post&id=<?=$post['id']; ?>">
            <h2><?= $post['title']; ?></h2>
                <span><?= dateConverter($post['date']); ?></span>
                <div><?= $post['summary']; ?></div>
                </a>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun article pour le moment...</p>
    <?php endif; ?>



    <?php getLatestPosts();?>