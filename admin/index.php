<?php
session_start();
include("../php/config.php");

if (!isset($_SESSION['id_admin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RizkyPratama Admin</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- box icon -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />

    <!-- css -->
    <style>
        <?php include "admin.css" ?>
        <?php include "../style.css" ?>
    </style>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <?php
    if (isset($_GET['type'])) {
        $type = $_GET['type'];
        if ($type == 'dashboard') {
            include 'dashboard.php';
        } elseif ($type == 'user') {
            include 'user.php';
        } elseif ($type == 'produk') {
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                switch ($category) {
                    case 'banner':
                        include 'banner.php';
                        break;
                    case 'print-stiker':
                        include 'printstiker.php';
                        break;
                    case 'kartu-nama':
                        include 'kartunama.php';
                        break;
                    case 'print-a3+':
                        include 'printa3+.php';
                        break;
                    case 'id-card':
                        include 'idcard.php';
                        break;
                    case 'plakat':
                        include 'plakat.php';
                        break;
                    case 'pin-mug':
                        include 'pinmug.php';
                        break;
                    case 'kaos':
                        include 'kaos.php';
                        break;
                    case 'stempel':
                        include 'stempel.php';
                        break;
                    default:
                        include 'produk.php';
                }
            } else {
                include 'produk.php';
            }
        } elseif ($type == 'pesanan') {
            include 'pesanan.php';
        } elseif ($type == 'ekspedisi') {
            include 'ekspedisi.php';
        } elseif ($type == 'kontak') {
            include 'kontak.php';
        }
    } else {
        include 'dashboard.php';
    }
    ?>

    <!-- sidebar -->
    <section id="menu">
        <div class="sidebar">
            <div class="logo-details">
                <!-- <i class="bx icon"></i> -->
                <div class="logo_name">Rizky<span>Pratama</span></div>
                <i class="bx bx-menu" id="btn"></i>
            </div>
            <ul class="nav-list">
                <li>
                    <a href="index.php?type=dashboard">
                        <i class="bx bx-grid-alt"></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?type=user">
                        <i class="bx bx-user"></i>
                        <span class="links_name">User</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="prod-btn">
                        <i class="bx bx-pie-chart-alt-2"></i>
                        <span class="links_name">Produk</span>
                        <i class="bx bx-chevron-down arrow"></i>
                    </a>
                    <ul class="prod-show">
                        <li><a href="index.php?type=produk&category=banner">
                                <span class="links_name">Banner</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=print-stiker">
                                <span class="links_name">Print Stiker</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=kartu-nama">
                                <span class="links_name">Kartu Nama</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=print-a3+">
                                <span class="links_name">Print A3+</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=id-card">
                                <span class="links_name">ID Card</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=plakat">
                                <span class="links_name">Plakat</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=pinmug">
                                <span class="links_name">Pin & Mug</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=kaos">
                                <span class="links_name">Kaos</span>
                            </a></li>
                        <li><a href="index.php?type=produk&category=stempel">
                                <span class="links_name">Stempel</span>
                            </a></li>
                    </ul>
                </li>
                <li>
                    <a href="index.php?type=pesanan">
                        <i class="bx bx-cart-alt"></i>
                        <span class="links_name">Pesanan</span>
                    </a>
                </li>
                <li>
                    <a href="index.php?type=ekspedisi">
                        <i class="bx bx-package"></i>
                        <span class="links_name">Jasa Ekspedisi</span>
                    </a>
                </li>
                <li class="profile">
                    <?php
                    $id = $_SESSION['id_admin'];
                    $query = mysqli_query($con, "SELECT * FROM `admin` WHERE id=$id");
                    while ($result = mysqli_fetch_assoc($query)) {
                        $res_email = $result['email'];
                        $res_username = $result['username'];
                    }
                    ?>
                    <div class="profile-details">
                        <img src="asset/img/admin-img.jpg" alt="profileImg" />
                        <div class="name_job">
                            <div class="name">
                                <?php echo htmlspecialchars($res_username); ?>
                            </div>
                            <div class="job">Admin</div>
                        </div>
                    </div>
                    <a href="logout.php"><i class="bx bx-log-out" id="log_out"></i></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- javaScript -->
    <script src="admin.js"></script>
</body>

</html>