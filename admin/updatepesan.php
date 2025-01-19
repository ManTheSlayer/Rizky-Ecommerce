<?php
include("../php/config.php");
$penerima_id = 99; // ID admin, ubah sesuai kebutuhan

$sql = "UPDATE kontak SET status_baca = 1 WHERE penerima_id = '$penerima_id' AND status_baca = 0";
if (mysqli_query($con, $sql)) {
    echo "Status baca diperbarui.";
} else {
    echo "Gagal memperbarui status: " . mysqli_error($con);
}