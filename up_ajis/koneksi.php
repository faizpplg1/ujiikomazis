<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect("localhost", "root", "", "up_aziz");
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>