<?php
require_once 'config.php';
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $mobile = $_POST['mobile'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];

  $passwordHash = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, email, password, mobile, gender, address) VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ssssss", $username, $email, $passwordHash, $mobile, $gender, $address);
  $stmt->execute();

  echo json_encode(['success' => true]);
}
?>