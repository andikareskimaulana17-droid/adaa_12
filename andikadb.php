<?php
$conn = mysqli_connect("localhost", "root", "", "kenangan_db");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
<?php
session_start();
include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users 
WHERE username='$username' AND password='$password'");

$data = mysqli_fetch_array($query);

if ($data) {
    $_SESSION['user'] = $data['username'];
    header("Location: index.php");
} else {
    echo "Login gagal!";
}
?>