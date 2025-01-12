<?php
include("../php/config.php");

// ========================= menghitung pesanan masuk ==========================
$query_pesanan = mysqli_query($con, "SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan = 'diproses'");
$pesanan = mysqli_fetch_assoc($query_pesanan);
$pesanan_masuk = $pesanan['total'];

// =================== menghitung total produk ===============================
// Query untuk menghitung jumlah item di tabel produk
$query_produk = mysqli_query($con, "SELECT COUNT(*) as total FROM produk");
$row_produk = mysqli_fetch_assoc($query_produk);
$total_produk = $row_produk['total'];

// ==================== menghitung total user ===================
$query_user = mysqli_query($con, "SELECT COUNT(*) as total FROM user");
$user = mysqli_fetch_assoc($query_user);
$total_user = $user['total'];

// ==================== mengitung grand total pendapatan ==================
$query_pendapatan = mysqli_query($con, "SELECT SUM(grand_total) as total_pendapatan FROM pesanan WHERE status_pesanan = 'selesai'");
$row = mysqli_fetch_assoc($query_pendapatan);
$total_pendapatan = $row['total_pendapatan'];
?>

<!-- Dasboard section -->
<section class="home-section">
  <div class="dasboard">
    <h1>Dashboard</h1>
    <!-- Insights -->
    <ul class="insights">
      <li>
        <i class="bx bx-calendar-check"></i>
        <span class="info">
          <h3>
            <?= $pesanan_masuk ?>
          </h3>
          <p>Pesanan Masuk</p>
        </span>
      </li>
      <li>
        <i class="bx bx-pie-chart-alt-2"></i>
        <span class="info">
          <h3>
            <?= $total_produk ?>
          </h3>
          <p>Total Produk</p>
        </span>
      </li>
      <li>
        <i class="bx bx-user"></i>
        <span class="info">
          <h3>
            <?= $total_user ?>
          </h3>
          <p>Total User</p>
        </span>
      </li>
      <li>
        <i class="bx bx-money"></i>
        <span class="info">
          <h3>Rp
            <?= number_format($total_pendapatan, 0, ',', '.'); ?>
          </h3>
          <p>Total Pendapatan</p>
        </span>
      </li>
    </ul>

    <!-- Tentang kami -->
    <div class="tentang">
      <div class="tentang-box">
        <div class="tentang-item">
          <div class="item">
            <h1>Tentang Kami</h1>
            <img src="asset/img/tentangkami-admin.png" alt="Home" />
            <p>
              RizkyPratama telah menjadi pilihan utama dalam melayani kebutuhan cetak berbagai jenis dokumen dan media.
              Di bawah
              kepemilikan Bapak Suwandi, kami berkomitmen untuk memberikan layanan cetak berkualitas tinggi dengan harga
              yang kompetitif. Dengan pengalaman lebih dari 19 tahun, kami memahami betapa pentingnya ketepatan waktu,
              kualitas, dan kepuasan pelanggan. Tim kami yang profesional dan berpengalaman siap membantu berbagai
              proyek cetak, mulai dari kebutuhan pribadi hingga kebutuhan bisnis, termasuk cetak brosur, kartu nama,
              banner, undangan, dan banyak lagi. Kami bangga menjadi mitra tepercaya bagi banyak pelanggan setia yang
              selalu mengandalkan kami dalam memenuhi kebutuhan cetaknya. Dengan teknologi terbaru dan layanan yang
              cepat serta efisien, kami siap membantu mewujudkan ide-ide Anda ke dalam bentuk nyata.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>