<?php
// Konfigurasi database
$host = "localhost";
$username = "root"; // Default user di Laragon
$password = ""; // Kosongkan jika menggunakan pengaturan default Laragon
$database = "wedding_rsvp";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
