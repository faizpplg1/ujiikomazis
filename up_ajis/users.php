<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM users WHERE id=$id");
    header("Location: users.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Pengguna</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Daftar Pengguna</h2>
    <a href="add_user.php" class="btn">Tambah User</a>
    <a href="beranda.php" class="btn">Kembali</a>
    <table border="1" cellpadding="10">
      <tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
      </tr>
      <?php
      $data = mysqli_query($conn, "SELECT * FROM users");
      $no = 1;
      while ($d = mysqli_fetch_assoc($data)) {
          echo "<tr>
                  <td>$no</td>
                  <td>{$d['username']}</td>
                  <td>{$d['password']}</td>
                  <td>
                    <a class='btn btn-edit' href='edit_user.php?id={$d['id']}'>Edit</a> | 
                    <a class='btn btn-hapus' href='users.php?delete={$d['id']}' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
                  </td>
                </tr>";
      $no++; }?>
    </table>
  </div>
</body>
</html>