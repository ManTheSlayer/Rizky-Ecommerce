<?php
include("../php/config.php");

// Menghitung data
$query_pesanan = mysqli_query($con, "SELECT COUNT(*) as total FROM pesanan WHERE status_pesanan = 'diproses'");
$pesanan = mysqli_fetch_assoc($query_pesanan);
$pesanan_masuk = $pesanan['total'];

$query_produk = mysqli_query($con, "SELECT COUNT(*) as total FROM produk");
$row_produk = mysqli_fetch_assoc($query_produk);
$total_produk = $row_produk['total'];

$query_user = mysqli_query($con, "SELECT COUNT(*) as total FROM user");
$user = mysqli_fetch_assoc($query_user);
$total_user = $user['total'];

$query_pendapatan = mysqli_query($con, "SELECT SUM(grand_total) as total_pendapatan FROM pesanan WHERE status_pesanan = 'selesai'");
$row = mysqli_fetch_assoc($query_pendapatan);
$total_pendapatan = $row['total_pendapatan'];

$query_harian = mysqli_query($con, " SELECT tanggal, SUM(grand_total) as pendapatan_harian 
    FROM pesanan 
    WHERE status_pesanan = 'selesai' 
    GROUP BY tanggal 
    ORDER BY tanggal ASC
");

$data_harian = [];
$labels_harian = [];
while ($row = mysqli_fetch_assoc($query_harian)) {
  $labels_harian[] = $row['tanggal'];
  $data_harian[] = $row['pendapatan_harian'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

  <style>
    /* Global Styles */
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(120deg, #eef2f3, #8e9eab);
      color: #2b2d42;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
      height: 100vh;
      overflow-y: auto;
      padding-left: 12%;
    }



    h1 {
      text-align: center;
      margin-bottom: 40px;
      font-size: 2.5rem;
      color: #3f72af;
    }

    /* Container */
    .dashboard-container {
      max-width: 1500px;
      width: 100%;
      background: #ffffff;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
      margin-top: 60px;

    }


    /* Insights Section */
    .insights {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-bottom: 40px;
    }

    .insights li {
      flex: 1 1 calc(25% - 20px);
      background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .insights li:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }

    .insights li i {
      font-size: 3rem;
      color: #3f72af;
      margin-bottom: 10px;
    }

    .insights li h3 {
      font-size: 1.8rem;
      color: #2b2d42;
      margin: 0;
    }

    .insights li p {
      font-size: 1rem;
      color: #8d99ae;
    }

    /* Charts Section */
    .charts {
      margin-bottom: 30px;
      background: #f8f9fa;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .charts h3 {
      color: #3f72af;
      margin-bottom: 20px;
      font-size: 1.5rem;
    }

    canvas {
      max-width: 100%;
      height: 400px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .insights li {
        flex: 1 1 calc(50% - 20px);
      }

      .dashboard-container {
        margin-left: 18%;
      }

    }

    @media (max-width: 768px) {
      .insights li {
        flex: 1 1 80%;
      }

      body {
        left: 20px;
      }

      .dashboard-container {
        margin-right: px
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>

<body>
  <div class="dashboard-container">
    <h1>Dashboard</h1>


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

    <div class="charts">
      <h3>Data Pesanan, Produk, dan User</h3>
      <canvas id="chartOverview"></canvas>
    </div>
    <div class="charts">
      <h3>Pendapatan Harian</h3>
      <canvas id="lineChartPendapatan"></canvas>
    </div>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const dataDashboard = {
        pesanan: <?= $pesanan_masuk ?>,
        produk: <?= $total_produk ?>,
        user: <?= $total_user ?>
      };

      // Chart Overview (Pesanan, Produk, User)
      const ctxOverview = document.getElementById('chartOverview').getContext('2d');
      new Chart(ctxOverview, {
        type: 'bar',
        data: {
          labels: ['Pesanan Masuk', 'Total Produk', 'Total User'],
          datasets: [{
            label: 'Jumlah',
            data: [dataDashboard.pesanan, dataDashboard.produk, dataDashboard.user],
            backgroundColor: [
              'rgba(75, 192, 192, 0.6)',
              'rgba(54, 162, 235, 0.6)',
              'rgba(255, 206, 86, 0.6)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              position: 'top'
            }
          }
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      // Line Chart (Pendapatan Harian)
      const ctxLineChart = document.getElementById('lineChartPendapatan').getContext('2d');
      const labelsHarian = <?= json_encode($labels_harian) ?>;
      const dataHarian = <?= json_encode($data_harian) ?>;

      new Chart(ctxLineChart, {
        type: 'line',
        data: {
          labels: labelsHarian,
          datasets: [{
            label: 'Pendapatan Harian',
            data: dataHarian,
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.4,
            pointBackgroundColor: 'rgba(54, 162, 235, 1)'
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { display: true }
          },
          scales: {
            x: { title: { display: true, text: 'Tanggal' } },
            y: { title: { display: true, text: 'Pendapatan (Rp)' } }
          }
        }
      });
    });
  </script>
</body>

</html>