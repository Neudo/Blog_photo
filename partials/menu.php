<header>
<a class="logo" href="index.php"><img src="assets/img/logo-amp.png" alt=""></a>
	<nav>
		<a class="slide-line" href="index.php?page=gallery">Thèmes</a><br>
		<a class="slide-line" href="index.php?page=posts">Blog</a>
		<a class="slide-line" href="index.php?page=bio">Biographie</a>
		<a class="slide-line" href="index.php?page=contact">Contact</a>
	
	
		<?php if(!isset($_SESSION['user'])): ?> 
			<!-- <a class="slide-line" href="index.php?page=user&action=login">Se connecter</a> -->
			<!-- <a class="slide-line" href="index.php?page=user&action=register">S'inscrire</a> -->
			<a href="index.php?page=user&action=choose"><img src="assets/img/various/account.png" alt=""></a>
	
			<?php else: ?>
	
			<h2>Salut, <?= $_SESSION['user']['pseudo']; ?> !</h2> 
			<a href="index.php?page=user&action=logout">Déconnexion</a>  
		
			<?php if($_SESSION['user']['is_admin'] == 1): ?>  
				<a href="./admin">Administration</a>
			<?php else : ?>
				<a href="index.php?page=user&action=edit">Mon compte</a>
			<?php endif; ?>
		<?php endif; ?>
	</nav>
</header>
