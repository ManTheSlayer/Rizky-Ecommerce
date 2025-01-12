<?php
include("../php/config.php");
session_start();
$loggedIn = isset($_SESSION['id_user']);
// if (!isset($_SESSION['valid'])) {
//   header('Location: ../index.php');
//   exit();
// }

// Periksa apakah 'id_user' telah diatur dalam sesi
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Menghitung jumlah item dalam keranjang
    $query_count = mysqli_query($con, "SELECT COUNT(*) as total FROM keranjang WHERE id_user = '$id_user'");
    $row = mysqli_fetch_assoc($query_count);
    $total_items = $row['total'];
} else {
    // Jika 'id_user' tidak diatur, set total_items ke 0 atau berikan nilai default lainnya
    $total_items = 0;
}

if (isset($_POST['shopping-cart'])) {

    if (!isset($_SESSION['id_user'])) {
        // Jika pengguna belum login, arahkan ke halaman login
        echo "<script>alert('Silakan login terlebih dahulu'); window.location.href = '../login.php';</script>";
        exit;
    }

    $product_id_case = $_POST['id_produk'];
    $product_kategori = $_POST['kategori'];
    $product_name = $_POST['nama'];
    $product_price = $_POST['harga'];
    $product_image = $_POST['gambar'];
    $product_quantity = 1; // Set kuantitas menjadi 1
    $product_berat = $_POST['berat'];

    include("../php/config.php");

    // Cek apakah produk sudah ada di keranjang
    $select_cart = mysqli_prepare($con, "SELECT * FROM keranjang WHERE nama = ? AND id_user = ?");
    mysqli_stmt_bind_param($select_cart, "si", $product_name, $id_user);
    mysqli_stmt_execute($select_cart);
    $result = mysqli_stmt_get_result($select_cart);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Produk sudah ada di keranjang!'); window.location.href = 'kartunama.php';</script>";
    } else {
        $insert_cart = mysqli_prepare($con, "INSERT INTO keranjang (id_user, id_produk, nama, kategori, harga, gambar, kuantitas, berat) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($insert_cart, "iissisii", $id_user, $product_id_case, $product_name, $product_kategori, $product_price, $product_image, $product_quantity, $product_berat);
        mysqli_stmt_execute($insert_cart);
        if (mysqli_stmt_affected_rows($insert_cart) > 0) {
            echo "<script>alert('Produk ditambahkan ke keranjang!'); window.location.href = 'kartunama.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk ke keranjang!'); window.location.href = 'kartunama.php';</script>";
        }
    }

    mysqli_stmt_close($select_cart);
    mysqli_stmt_close($insert_cart);
    mysqli_close($con);
}
;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk - Stiker</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
        rel="stylesheet" />
    <!-- Feather Icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <!-- css -->
    <!-- <link rel="stylesheet" href="../style.css" /> -->
    <style>
        <?php include "../style.css" ?>
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="../index.php" class="navbar-logo">Rizky<span>Pratama</span></a>
        <div class="navbar-nav">
            <a href="../index.php">Beranda</a>
            <div class="dropdown">
                <a href="#">Kategori</a>
                <div class="dropdown-menu">
                    <a href="banner.php">Banner</a>
                    <a href="stiker.php">Print Stiker</a>
                    <a href="#">Kartu Nama</a>
                </div>
            </div>
            <a href="../tentang-kami.php">Tentang Kami</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search-button"><i data-feather="search"></i></a>
            <a href="<?php echo $loggedIn ? '../keranjang.php' : 'login.php'; ?>" id="shopping-cart-button">
                <i data-feather="shopping-cart"></i>(
                <?= $total_items ?>)
            </a>
            <a href="<?php echo $loggedIn ? '../akun/akun.php' : '../login.php'; ?>" id="user-button">
                <i data-feather="user"></i>|
                <?php echo $loggedIn ? 'Akun' : 'Masuk'; ?>
            </a>
            <a href="../signup.php" id="daftar" style="font-size: 1.2rem;">Daftar</a>
            <p href="#" id="batas" style="font-size: 1.2rem;">|</p>
            <a href="../login.php" id="login" style="font-size: 1.2rem;">Masuk</a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- search box -->
        <form action="../search.php" method="post" class="search-form" id="search-form">
            <input type="text" name="keyword" id="search-box" placeholder="Cari disini..." autocomplete="off" />
            <!-- <label for="search-box" name="cari" id="search-label"><i data-feather="search"></i></label> -->
            <button type="submit" name="cari" id="search-button-box" class="disabled" disabled><i
                    data-feather="search"></i></button>
        </form>
    </nav>

    <!-- isi case -->
    <section class="produk">
        <div class="container">
            <h1>PRODUK</h1>
            <h1>Art paper - Art carton - Linen </h1>
        </div>
        <div class="title">
            <h2>Kartu Nama</h2>
        </div>
        <div class="produk-item">
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM produk WHERE kategori = 'kartunama'");
            while ($row = mysqli_fetch_assoc($result)):
                ?>
                <div class="produk-card">
                    <img src="../admin/asset/img/produk/<?= $row['gambar'] ?>" alt="Image">
                    <h3 class="produk-card-title">
                        <?= $row['nama'] ?>
                    </h3>
                    <p class="produk-card-price">Rp
                        <?= number_format($row['harga']) ?>
                    </p>
                    <form class="add-to-cart-form" method="post" action="">
                        <a href="../detail/kartunama-detail.php?id=<?= $row['id'] ?>" id="detail"><i
                                data-feather="eye"></i></a>
                        <input type="hidden" name="id_produk" value="<?= $row['id'] ?>">
                        <input type="hidden" name="kategori" value="<?= $row['kategori'] ?>">
                        <input type="hidden" name="nama" value="<?= $row['nama'] ?>">
                        <input type="hidden" name="harga" value="<?= $row['harga'] ?>">
                        <input type="hidden" name="gambar" value="<?= $row['gambar'] ?>">
                        <input type="hidden" name="kuantitas" value="1">
                        <input type="hidden" name="berat" value="<?= $row['berat'] ?>">
                        <button type="submit" name="shopping-cart" class="shopping-cart-button"
                            style="background: none; border: none; color:#000; cursor:pointer;"
                            onmouseover="this.style.color='#028f6c';" onmouseout="this.style.color='#000';">
                            <i data-feather="shopping-cart"></i>
                        </button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="footer" id="footer">
            <div class="footer-content">
                <div class="jelajah">
                    <h4>Jelajahi Kami</h4>
                    <div class="tentang">
                        <a href="banner.php"><i data-feather="chevron-right" width="16" height="16"></i> Banner</a>
                        <a href="stiker.php"><i data-feather="chevron-right" width="16" height="16"></i> Print
                            Stiker</a>
                        <a href="kartunama.php"><i data-feather="chevron-right" width="16" height="16"></i>
                            Kartu Nama</a>
                        <a href="../tentang-kami.php"><i data-feather="chevron-right" width="16" height="16"></i>
                            Tentang Kami</a>
                    </div>
                </div>
                <div class="social-media">
                    <h4>Ikuti Kami</h4>
                    <div class="ig"><a href="https://www.instagram.com/gadgetarn?igsh=N3p3ZzJhcGlkNndm"><i
                                data-feather="instagram"></i> Instagram</a></div>
                    <div class="fb"><a href="https://www.facebook.com/profile.php?id=61563441818623&mibextid=ZbWKwL"><i
                                data-feather="facebook"></i> Facebook</a></div>
                </div>
                <div class="pembayaran">
                    <h4>Pembayaran</h4>
                    <img src="../asset/img/pembayaran/Mandiri.jpeg" alt="Mandiri" class="mandiri">
                    <img src="../asset/img/pembayaran/Dana.jpeg" alt="Dana" class="dana">
                </div>
            </div>
        </div>
        <div class="credit">
            <p><a href="">Lurida<span>Innovations</span></a> | &copy; 2024.</p>
        </div>
    </footer>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- javaScript -->
    <script>
        <?php include "../script.js"; ?>
    </script>
    <!-- search box button -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchBox = document.getElementById('search-box');
            const searchButton = document.getElementById('search-button-box');

            function checkSearchButton() {
                const keyword = searchBox.value.trim();
                if (keyword !== '') {
                    searchButton.classList.remove('disabled');
                    searchButton.classList.add('enabled');
                    searchButton.disabled = false;
                } else {
                    searchButton.classList.add('disabled');
                    searchButton.classList.remove('enabled');
                    searchButton.disabled = true;
                }
            }

            searchBox.addEventListener('input', checkSearchButton);

            // Panggil fungsi saat halaman selesai dimuat untuk memastikan tombol dalam status yang benar
            checkSearchButton();
        });
    </script>

    <!-- login -->
    <script>
        var loggedIn = <?php echo json_encode($loggedIn); ?>;
        // Menyembunyikan tombol keranjang jika pengguna belum login
        if (!loggedIn) {
            const searchButton = document.getElementById("search-button");
            const shoppingCartButton = document.getElementById("shopping-cart-button");
            const userButton = document.getElementById("user-button");

            if (searchButton) {
                searchButton.style.display = 'none';
            }
            if (shoppingCartButton) {
                shoppingCartButton.style.display = 'none';
            }
            if (userButton) {
                userButton.style.display = 'none';
            }
        }

        if (loggedIn) {
            const daftarButton = document.getElementById("daftar")
            const batas = document.getElementById("batas")
            const loginButton = document.getElementById("login")

            if (daftarButton) {
                daftarButton.style.display = 'none';
            }
            if (batas) {
                batas.style.display = 'none';
            }
            if (loginButton) {
                loginButton.style.display = 'none';
            }
        }
    </script>
</body>

</html>