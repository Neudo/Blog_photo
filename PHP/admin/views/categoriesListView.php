<h3>Liste des catégories</h3>

<a class="addCategory" href="index.php?page=categories&action=new">Ajouter une nouvelle catégorie.</a> 

<p></p>

<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>

	<?php foreach($categories as $category): ?>	

		<tr>
			<td><?= $category['id'];?></td>
			<td><?= $category['name'];?></td>
			<td>
				<a class="edit" href="index.php?page=categories&action=edit&id=<?= $category['id'];?>">Modifier</a>
				<a class="danger" href="index.php?page=categories&action=delete&id=<?= $category['id'];?>">Supprimer</a>
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>

