<?php
session_start();
include("../php/config.php");
$loggedIn = isset($_SESSION['id_user']);
// if (!isset($_SESSION['valid'])) {
//   header('Location: ../index.php');
//   exit();
// }
$id_user = $_SESSION['id_user'];

// Menghitung jumlah item dalam keranjang
$query_count = mysqli_query($con, "SELECT COUNT(*) as total FROM keranjang WHERE id_user = '$id_user'");
$row = mysqli_fetch_assoc($query_count);
$total_items = $row['total'];
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pesanan</title>
  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500:0,600:0,700;1,700&display=swap"
    rel="stylesheet" />

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.10/dist/sweetalert2.min.js"></script>

  <!-- css -->
  <!-- <link rel="stylesheet" type="text/css" href="../style.css" /> -->
  <style>
    <?php include "../style.css" ?>
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <a href="#" class="navbar-logo">Rizky<span>Pratama</span></a>

    <div class="navbar-nav">
      <a href="../index.php">Beranda</a>
      <div class="dropdown">
        <a href="../kategori/katalog.php">Kategori</a>
        <div class="dropdown-menu">
          <a href="../kategori/banner.php">Banner</a>
          <a href="../kategori/stiker.php">Print Stiker</a>
          <a href="../kategori/kartunama.php">Kartu Nama</a>
          <a href="../kategori/printa3+.php">Print A3+</a>
          <a href="../kategori/idcard.php">ID Card</a>
          <a href="../kategori/plakat.php">Plakat</a>
          <a href="../kategori/pinmug.php">pinmug</a>
          <a href="../kategori/stempel.php">Stempel</a>
        </div>
      </div>
      <a href="#" class="nav-akun">Akun</a>
      <a href="pesanan.php" class="nav-pesanan">Pesanan Saya</a>
      <a href="ubahpw.php" class="nav-ubahpw">Ganti Password</a>
      <a href="../tentang-kami.php">Tentang Kami</a>
      <a href="../php/logout.php" class="nav-logout">Keluar</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="../keranjang.php" id="shopping-cart-button"><i data-feather="shopping-cart"></i>(
        <?= $total_items ?>)
      </a>
      <a href="<?php echo $loggedIn ? 'akun.php' : 'login.php'; ?>" id="user-button">
        <i data-feather="user"></i>|
        <?php echo $loggedIn ? 'Akun' : 'Login'; ?>
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

  <!-- main item -->
  <section class="all-container">
    <div>
      <div class="side-bar-pesanan">
        <div class="box-item">
          <p class="judul-pesanan">Pesanan Saya</p>
          <!-- menu item -->
          <div class="menu">
            <div class="item">
              <a href="akun.php" class="menu-item active" id="menu-pesanan">
                <i class="fa fa-user"></i> Akun Saya
              </a>
            </div>
            <div class="item">
              <a href="pesanan.php" class="menu-item">
                <i class="fa fa-list"></i> Pesanan Saya
              </a>
            </div>
            <div class="item">
              <a href="ubahpw.php" class="menu-item">
                <i class="fa fa-lock"></i> Ganti Password
              </a>
            </div>
            <div class="item">
              <a href="../php/logout.php" class="menu-item">
                <i class="fa fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </div>


          <?php
          if (isset($_GET['type'])) {
            $type = $_GET['type'];
            if ($type == 'diproses') {
              include 'diproses.php';
            } elseif ($type == 'dikemas') {
              include 'dikemas.php';
            } elseif ($type == 'dikirim') {
              include 'dikirim.php';
            } elseif ($type == 'selesai') {
              include 'selesai.php';
            } elseif ($type == 'ditolak') {
              include 'ditolak.php';
            }
          } else {
            include 'diproses.php';
          }
          ?>

          <!-- Pesanan saya -->
          <div class="pesanan" id="pesanan">
            <div class="container-judul">
              <div class="pesanan-item">
                <a href="pesanan.php?type=diproses" class="diproses" id="diproses">Diproses</a>
              </div>
              <div class="pesanan-item">
                <a href="pesanan.php?type=dikemas" class="dikemas" id="dikemas">Dikemas</a>
              </div>
              <div class="pesanan-item">
                <a href="pesanan.php?type=dikirim" class="dikirim" id="dikirim">Dikirim</a>
              </div>
              <div class="pesanan-item">
                <a href="pesanan.php?type=selesai" class="selesai" id="selesai">Selesai</a>
              </div>
              <div class="pesanan-item">
                <a href="pesanan.php?type=ditolak" class="ditolak" id="ditolak">Ditolak</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- footer -->
  <footer>
    <div class="footer" id="footer">
      <div class="footer-content">
        <div class="jelajah">
          <h4>Jelajahi Kami</h4>
          <div class="tentang">
            <a href="kategori/banner.php"><i data-feather="chevron-right" width="16" height="16"></i> Banner</a>
            <a href="kategori/stiker.php"><i data-feather="chevron-right" width="16" height="16"></i> Print Stiker</a>
            <a href="kategori/kartunama.php"><i data-feather="chevron-right" width="16" height="16"></i> Kartu Nama</a>
            <a href="tentang-kami.php"><i data-feather="chevron-right" width="16" height="16"></i> Tentang Kami</a>
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const urlParams = new URLSearchParams(window.location.search);
      const type = urlParams.get('type') || 'diproses'; // Default ke 'diproses' jika 'type' tidak ada

      const tabs = ['diproses', 'dikemas', 'dikirim', 'selesai', 'ditolak'];
      tabs.forEach(tab => {
        const element = document.getElementById(tab);
        if (element) {
          if (tab === type) {
            element.classList.add('active');
          } else {
            element.classList.remove('active');
          }

          element.addEventListener('click', function () {
            tabs.forEach(t => {
              const el = document.getElementById(t);
              if (el) {
                el.classList.remove('active');
              }
            });
            this.classList.add('active');
          });
        }
      });
    });
  </script>

  <!-- javaScript -->
  <script>
    <?php include "../script.js"; ?>
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
</body>

</html>