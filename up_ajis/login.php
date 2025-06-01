<?php
session_start();
include "koneksi.php";

$pesan_error = "";
$pesan_sukses = "";

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        if ($data['password'] === $pass) {
            $_SESSION['username'] = $user;
            $pesan_sukses = "Login berhasil! Mengarahkan ke beranda...";
            echo "<meta http-equiv='refresh' content='2;url=beranda.php'>";
        } else {
            $pesan_error = "Password salah!";
        }
    } else {
        $pesan_error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <?php if ($pesan_error) echo "<p class='pesan'>$pesan_error</p>"; ?>
    <?php if ($pesan_sukses) echo "<p class='pesan-sukses'>$pesan_sukses</p>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" name="login" value="Login">
    </form>
    <p>Belum punya akun? <a href="register.php">Daftar dulu</a></p>
  </div>
</body>
</html>