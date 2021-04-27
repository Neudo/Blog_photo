    <header>
        <?php if(isset($selectedCategory)): ?>
            <h1><?= $selectedCategory['name'] ?></h1>
            <p><?= $selectedCategory['description'] ?></p>
            <img src="assets/img/categories/<?= $selectedCategory['img'];?>" alt="<?=$selectedCategory['name'];?>">
        <?php else: ?>
            <h3 class="vertical">Derniers articles</h3>
        <?php endif; ?>
    </header>

    <div class="container-latest-posts">
        <?php if(count($posts) > 0): ?>
            <?php for($posts as $post): ?>
            <article>
                <a href="index.php?page=post&id=<?=$post['id']; ?>">
                <img src="../assets/img/posts/<?= $selectedPost['img'];?>" alt="<?=$selectedPost['title'];?>"> 
                <h2><?= $post['title']; ?></h2>
                    <span><?= dateConverter($post['date']); ?></span>
                    <div><?= $post['summary']; ?></div>
                    </a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article pour le moment...</p>
        <?php endif; ?>
    </div>
