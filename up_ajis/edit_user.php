<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    mysqli_query($conn, "UPDATE users SET username='$user', password='$pass' WHERE id=$id");
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Edit User</h2>
    <form method="post">
      <input type="text" name="username" value="<?= $data['username'] ?>" required><br>
      <input type="text" name="password" value="<?= $data['password'] ?>" required><br>
      <input class="btn" type="submit" name="update" value="Update">
      <input type="button" onclick="window.location.href='users.php'" class="btn" value="Kembali">
    </form>
  </div>
</body>
</html>