<?php
session_start();
if (!isset($_SESSION['username'])) {
    header ("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Beranda</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
    <a href="users.php" class="btn">Daftar Pengguna</a>
    <a href="logout.php" class="btn">Logout</a>
  </div>
</body>
</html>