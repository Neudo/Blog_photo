<?php 

function addComment() {
  global $db;$db = dbConnect();
  $query = $db->prepare("INSERT INTO posts (comment, author")
  VALUES
}





?>