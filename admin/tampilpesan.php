<?php
include 'koneksi.php';

// Ambil ID pengguna dari sesi
$current_user_id = 1; // Misalnya, ID pengguna adalah 1 (ganti sesuai sesi)

// Ambil pesan terkait pengguna saat ini
$sql = "SELECT * FROM kontak 
        WHERE pengirim_id = '$current_user_id' OR penerima_id = '$current_user_id' 
        ORDER BY tanggal ASC";

$result = mysqli_query($koneksi, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['pengirim_id'] == $current_user_id) {
        echo "<div class='pesan-saya'>{$row['pesan']}</div>";
    } else {
        echo "<div class='pesan-lawan'>{$row['pesan']}</div>";
    }
}
?>