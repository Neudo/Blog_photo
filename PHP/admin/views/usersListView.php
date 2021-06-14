<h3>Liste des utilisateurs</h3>

<a class="addCategory" href="index.php?page=users&action=new">Ajouter un nouvelle utilisateur.</a> 
<p></p>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Pseudo</th>
      <th>Email</th>
			<th>Admin</th>
      <th>Actions</th>
			
		</tr>
	</thead>
	<tbody>

	<?php foreach($users as $user): ?>	

		<tr>
			<td><?= $user['id'];?></td>
      <td><?= $user['pseudo'];?></td>
      <td><?= $user['email'];?></td>
				<td><?php if ($user['is_admin']  == 0): ?>
							<?= "Non"; ?>
								<?php else: ?>
							<?= "Oui"; ?></td>
						<?php endif; ?>


			<td>
				<a class="edit" href="index.php?page=users&action=edit&id=<?= $user['id'];?>">Modifier</a>
				<a class="danger" href="index.php?page=users&action=delete&id=<?= $user['id'];?>">Supprimer</a>
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>
