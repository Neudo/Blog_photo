<?php

function newUser($submittedPseudo, $submittedEmail, $submittedPassword, $submittedBio) {
  global $db;

  $query = $db->prepare('INSERT INTO users (pseudo, email, bio, password) VALUES (?, ?, ?, ?)');
  $result = $query->execute(
    [
      $submittedPseudo,
      $submittedEmail,
      $submittedBio,
      password_hash($submittedPassword, PASSWORD_DEFAULT)
    ]
    );
}

function login($email, $password) {
  global $db;

  $query = $db->prepare('SELECT * FROM users WHERE email = ?'); 
  $query->execute( [$email] );

  $user = $query->fetch();

  if($user == true) {
    if(password_verify($password, $user['password'])) {
      return $user;
    }
    else {
      return false;
    }
  }
  else {
    return false;
  }
}

function getAllUsers(){
  global $db;
  $query = $db->query("SELECT * FROM users");

  $users = $query->fetchAll();
  return $users;
}

function getPseudo(){
  global $db;
  $query = $db->query("SELECT pseudo FROM users");

  $pseudo = $query->fetchAll();
  return $pseudo;
}


function getUser($userId){
  global $db;
  $query = $db->prepare("SELECT * FROM users WHERE id = ?");
  $query->execute([$userId]);

  return $query->fetch();
}

function deleteUser($userId) {
  global $db;
  $query = $db->prepare('DELETE FROM users WHERE id = ?');
  return $query->execute([$userId]);
}

    function updateUser($userId, $data) {
      global $db;
      $query = $db->prepare('UPDATE users SET pseudo = :new_pseudo, bio = :new_bio, password = :new_password  WHERE id = :user_id');
      return $query->execute(
    [
      'new_bio' => $data['bio'],
      'user_id' => $userId,
      'new_pseudo' => $data['pseudo'],
      'new_password' => $data['password']
    ]
  );
}

?>