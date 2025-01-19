<?php
include("../php/config.php");
session_start();

$admin_id = $_SESSION['id_admin']; // ID admin

// Query untuk mengambil daftar user yang pernah mengirim pesan ke admin
$query = "SELECT DISTINCT pengirim_id FROM kontak WHERE penerima_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Chat</title>
</head>

<body>
    <h1>Daftar User</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <a href="admin_chat_tab.php?user_id=<?= $row['pengirim_id']; ?>" target="_blank">
                    User ID:
                    <?= $row['pengirim_id']; ?>
                </a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>