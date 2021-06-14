<?php 

function addComment($content, $postId, $userId) {
  global $db;
  $query = $db->prepare('INSERT INTO comments (content, post_id, user_id) 
  VALUES (?, ?, ?)');
  return $query->execute(
    [
      $content,
      $postId,
      $userId
    ]
  );
}

function getPostComments($postId) {
  global $db;
  $query = $db->prepare('SELECT c.*, u.pseudo AS author
  FROM comments c
  JOIN users u ON c.user_id = u.id
  WHERE post_id = ?
  ORDER BY c.created_at DESC');
  $query->execute([$postId]);
  return $query->fetchAll();
}

function getAllComments() {
  global $db;
  $query = $db->query("SELECT *
  FROM comments
  ORDER BY created_at DESC ");
  $comments = $query->fetchAll();
  return $comments;
}

function deleteComment($commentId) {
  global $db;
  $query = $db->prepare('DELETE FROM comments WHERE id = ?');
  return $query->execute([$commentId]);
}

?>