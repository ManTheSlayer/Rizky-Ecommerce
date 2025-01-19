<?php
include("php/config.php");

$pengirim_id = $_POST['pengirim_id'];
$penerima_id = $_POST['penerima_id'];
$pesan = $_POST['pesan'];
$tanggal = date('Y-m-d H:i:s');

// Query untuk menyimpan pesan
$sql = "INSERT INTO kontak (pengirim_id, penerima_id, pesan, tanggal, status_baca) 
        VALUES ('$pengirim_id', '$penerima_id', '$pesan', '$tanggal', 0)";

if (mysqli_query($con, $sql)) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Gagal mengirim pesan: " . mysqli_error($con);
}
?>