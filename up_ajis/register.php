<?php
include "koneksi.php";
if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
    if (mysqli_num_rows($check) > 0) {
        $pesan = "Username sudah terdaftar!";
    } else {
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$user', '$pass')");
        $pesan = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Register</h2>
    <?php if (isset($pesan)) echo "<p class='pesan'>$pesan</p>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="password" placeholder="Password" required><br>
      <input type="submit" name="register" value="Register">
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
  </div>
</body>
</html>