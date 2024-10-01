<?php
require_once 'config.php';
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $user = authenticateUser($username, $password);

  if ($user) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
   
    echo json_encode(['success' => true]);
  } 
  else {

    echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
  }
}
?>