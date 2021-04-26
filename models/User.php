<?php

function newUser($submittedPseudo, $submittedEmail, $submittedPassword) {
  $db = dbConnect();

  $query = $db->prepare('INSERT INTO users (pseudo, email, password) VALUES (?, ?, ?)');
  $result = $query->execute(
    [
      $submittedPseudo,
      $submittedEmail,
      password_hash($submittedPassword, PASSWORD_DEFAULT)
    ]
    );
}

function login($email, $password) {
  $db = dbConnect();

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
  $db = dbConnect();
  $query = $db->query("SELECT * FROM users");

  $users = $query->fetchAll();
  return $users;
}

function getUser($userId){
  $db = dbConnect();
  $query = $db->prepare("SELECT * FROM users WHERE id = ?");
  $query->execute([$userId]);

  return $query->fetch();
}

function deleteUser($userId) {
  $db = dbconnect();
  $query = $db->prepare('DELETE FROM users WHERE id = ?');
  return $query->execute([$userId]);
}

    function updateUser($userId, $data) {
      $db = dbconnect();
      $query = $db->prepare('UPDATE users SET pseudo = :new_pseudo, email = :new_email, password = :new_password  WHERE id = :user_id');
      return $query->execute(
    [
      'new_description' => $data['pseudo'],
      'user_id' => $userId,
      'new_name' => $data['email'],
      'new_password' => $data['password']
    ]
  );
}

?>