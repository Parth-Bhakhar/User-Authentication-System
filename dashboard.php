<?php
require_once 'config.php';
require_once 'auth.php';

if (isset($_SESSION['username'])) {
  // Display update profile form
  ?>
  <h1>Update Profile</h1>
  <form action="update-profile.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"><br><br>
    <input type="submit" value="Update Profile">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update user profile information
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $username, $email, $_SESSION['id']);
    $stmt->execute();

    // Redirect to dashboard
    header('Location: dashboard.php');
    exit;
  }
} else {
  // Redirect to login page
  header('Location: index.html');
  exit;
}
?>