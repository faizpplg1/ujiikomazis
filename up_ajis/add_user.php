<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Tambah User</h2>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input class="btn" type="submit" name="simpan" value="Simpan">
      <input type="button" onclick="window.location.href='users.php'" class="btn" value="Kembali">
    </form>
  </div>
</body>
</html>