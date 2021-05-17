<h3>Liste des articles</h3>

<a class="addCategory" href="index.php?page=posts&action=new">Publier un nouvelle article.</a> 

<p></p>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titre</th>
      <th>Catégorie(s)</th>
      <th>Publié</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($posts as $post): ?>	

		<tr>
			<td><?= $post['id'];?></td>
      <td><?= $post['title'];?></td>
			<td><?= $post['category_id'];?></td>
			<td><?php if ($post['is_publied']) :?>
						<p>Oui</p>
					<?php else :?>
						<p>Non</p>
			<?php endif; ?>
			</td>

      
			<td>
				<a class="edit" href="index.php?page=posts&action=edit&id=<?= $post['id'];?>">Modifier</a>
				<a class="danger" href="index.php?page=posts&action=delete&id=<?= $post['id'];?>">Supprimer</a>
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>
