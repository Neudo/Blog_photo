<h3>Liste des commentaires</h3>


<table border="1">
	<thead>
		<tr>
			<th>ID</th>
      <!-- <th>Article</th> -->
			<th>Commentaire</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($comments as $comment): ?>	

		<tr>
			<td><?= $comment['id'];?></td>
			<!-- <td><?= $post['title'];?></td> -->
      <td><?= $comment['content'];?></td>

      
			<td>
				<a class="danger" href="index.php?page=comments&action=delete&id=<?= $comment['id'];?>">Supprimer</a>
			</td>
		</tr>

	<?php endforeach; ?>

	</tbody>
</table>
