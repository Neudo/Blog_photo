<nav class="nav-bar">
    <?php if($_SESSION['user']['is_admin'] == 1): ?>  
      <a href="index.php?page=categories&action=list">Gestion des catégories</a>
      <a href="index.php?page=posts&action=list">Gestion des articles</a>
      <a href="index.php?page=users&action=list">Gestion des utilisateurs</a>


      <a href="../">Retourner sur le site</a>
		<?php endif; ?>
</nav>
