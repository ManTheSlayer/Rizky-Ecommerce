<!-- pesanan section -->
<section class="pesanan-section">
  <div class="pesanan" style="position: static;">
    <h1>Daftar Pesanan</h1>
    <!-- diproses -->
    <div class="table">
      <div class="table-box">
        <div class="judul-box">
          <h1 class="processing-title">
            <i class="bx bx-loader-circle"></i> Diproses
          </h1>
        </div>
        <!-- Table -->
        <table id="tabel-proses">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Penerima</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Ekspedisi</th>
              <th>Total Harga</th>
              <th>Bukti Transfer</th>
              <th>Desain</th>
              <th>Catatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM pesanan WHERE status_pesanan = 'diproses'");
            while ($proses = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <input type="hidden" name="id" id="id" value="<?= $proses['id'] ?>" />
                <td>
                  <?= $proses['tanggal'] ?>
                </td>
                <td>
                  <?= $proses['nama_produk'] ?>
                </td>
                <td>
                  <?= $proses['namaLengkap'] ?>
                </td>
                <td>
                  <?= $proses['phone'] ?>
                </td>
                <td>
                  <?= $proses['alamat'] ?>
                </td>
                <td>
                  <?= $proses['ekspedisi'] ?>
                </td>
                <td>Rp
                  <?= number_format($proses['final_total']) ?>
                </td>
                <td>
                  <a href="#" class="bukti" data-bukti="<?= $proses['bukti'] ?>">
                    <button class="btn-edit" style="font-size: 0.7rem;">Cek bukti transfer</button>
                  </a>
                </td>
                <td>
                  <a href="#" class="desain" data-desain="<?= $proses['desain'] ?>">
                    <button class="btn-edit" style="font-size: 0.7rem;">Cek Desain</button>
                  </a>
                </td>
                <td style="text-align: center;">
                  <?= !empty($proses['catatan'])
                    ? htmlspecialchars($proses['catatan'])
                    : "<i style='color: red; display: block;'>~Catatan kosong!~</i>" ?>
                </td>


                <td>
                  <div style="display: flex; justify-content: space-between; width: 100%;">
                    <a href="#">
                      <button class="btn-hapus" id="kemas" style="background-color: #DAA520;"
                        data-id-proses="<?= $proses['id'] ?>">Kemas</button>
                    </a>
                    <a href="#">
                      <button class="btn-hapus" id="tolak" data-id-proses="<?= $proses['id'] ?>">Tolak</button>
                    </a>
                  </div>

                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- dikemas -->
    <div class="table">
      <div class="table-box">
        <div class="judul-box">
          <h1 class="packing-title">
            <i class="bx bx-package"></i> Dikemas
          </h1>
        </div>
        <!-- Table -->
        <table>
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Penerima</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Ekspedisi</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM pesanan WHERE status_pesanan = 'dikemas'");
            while ($row = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <td>
                  <?= $row['tanggal'] ?>
                </td>
                <td>
                  <?= $row['nama_produk'] ?>
                </td>
                <td>
                  <?= $row['namaLengkap'] ?>
                </td>
                <td>
                  <?= $row['phone'] ?>
                </td>
                <td>
                  <?= $row['alamat'] ?>
                </td>
                <td>
                  <?= $row['ekspedisi'] ?>
                </td>
                <td>Rp
                  <?= number_format($row['final_total']) ?>
                </td>
                <td>
                  <div style="display: flex; justify-content: space-between; width: 100%;">
                    <a href="update-resi.php?id=<?= $row['id'] ?>" onclick="return confirm('Kirim pesanan?');">
                      <button class="btn-hapus" id="kirim" style=" background-color: #DAA520;">Kirim</button>
                    </a>
                    <a href="hapus/hapus-kemas.php?id=<?= $row['id'] ?>" onclick="return confirm('Ingin menghapus?');">
                      <button class="btn-hapus" id="tolak">Hapus</button>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- dikirim -->
    <div class="table">
      <div class="table-box">
        <h1 class="shipping-title">
          <i class="bx bx-send"></i> Dikirim
        </h1>
        <!-- Table -->
        <table id="tabel-kirim">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Penerima</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Ekspedisi</th>
              <th>Resi</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM pesanan WHERE status_pesanan = 'dikirim'");
            while ($kirim = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <input type="hidden" name="id" id="id" value="<?= $kirim['id'] ?>" />
                <td>
                  <?= $kirim['tanggal'] ?>
                </td>
                <td>
                  <?= $kirim['nama_produk'] ?>
                </td>
                <td>
                  <?= $kirim['namaLengkap'] ?>
                </td>
                <td>
                  <?= $kirim['phone'] ?>
                </td>
                <td>
                  <?= $kirim['alamat'] ?>
                </td>
                <td>
                  <?= $kirim['ekspedisi'] ?>
                </td>
                <td>
                  <?= $kirim['resi'] ?>
                </td>
                <td>Rp
                  <?= number_format($kirim['final_total']) ?>
                </td>
                <td>
                  <div style="display: flex; justify-content: space-between; gap: 10px; width: 100%;">
                    <a href="#">
                      <button class="btn-hapus" id="selesai" data-id="<?= $kirim['id'] ?>"
                        style=" background-color: #DAA520;">Selesai</button>
                    </a>
                    <a href="hapus/hapus-kirim.php?id=<?= $kirim['id'] ?>" onclick="return confirm('Ingin menghapus?');">
                      <button class="btn-hapus">Hapus</button>
                    </a>
                  </div>

                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- selesai -->
    <div class="table">
      <div class="table-box">
        <div class="judul-box">
          <h1 class="completed-title">
            <i class="bx bx-check-circle"></i> Selesai
          </h1>
        </div>
        <!-- Table -->
        <table>
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Harga Produk</th>
              <th>Penerima</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Ekspedisi</th>
              <th>Resi</th>
              <th>Total Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM pesanan WHERE status_pesanan = 'selesai'");
            while ($selesai = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <input type="hidden" name="id" id="id" value="<?= $selesai['id'] ?>" />
                <td>
                  <?= $selesai['tanggal'] ?>
                </td>
                <td>
                  <?= $selesai['nama_produk'] ?>
                </td>
                <td>Rp
                  <?= number_format($selesai['grand_total']) ?>
                </td>
                <td>
                  <?= $selesai['namaLengkap'] ?>
                </td>
                <td>
                  <?= $selesai['phone'] ?>
                </td>
                <td>
                  <?= $selesai['alamat'] ?>
                </td>
                <td>
                  <?= $selesai['ekspedisi'] ?>
                </td>
                <td>
                  <?= $selesai['resi'] ?>
                </td>

                <td>Rp
                  <?= number_format($selesai['final_total']) ?>
                </td>
                <td>
                  <a href="hapus/hapus-selesai.php?id=<?= $selesai["id"] ?>"
                    onclick="return confirm('Ingin menghapus?');"><button class="btn-hapus">Hapus</button></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- tolak -->
    <div class="table">
      <div class="table-box">
        <div class="judul-box">
          <h1 class="rejected-title">
            <i class="bx bx-x-circle"></i> Ditolak
          </h1>
        </div>
        <!-- Table -->
        <table>
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Produk</th>
              <th>Penerima</th>
              <th>Telepon</th>
              <th>Alamat</th>
              <th>Ekspedisi</th>
              <th>Total Harga</th>
              <th>Bukti Transfer</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM pesanan WHERE status_pesanan = 'ditolak'");
            while ($tolak = mysqli_fetch_assoc($result)):
              ?>
              <tr>
                <td>
                  <?= $tolak['tanggal'] ?>
                </td>
                <td>
                  <?= $tolak['nama_produk'] ?>
                </td>
                <td>
                  <?= $tolak['namaLengkap'] ?>
                </td>
                <td>
                  <?= $tolak['phone'] ?>
                </td>
                <td>
                  <?= $tolak['alamat'] ?>
                </td>
                <td>
                  <?= $tolak['ekspedisi'] ?>
                </td>
                <td>Rp
                  <?= number_format($tolak['final_total']) ?>
                </td>
                <td><a href="#" class="bukti" data-bukti="<?= $tolak['bukti'] ?>"><button class="btn-edit"
                      style="font-size: 0.7rem;">Cek bukti transfer</button></a></td>
                <td>
                  <a href="hapus/hapus-tolak.php?id=<?= $tolak["id"] ?>"
                    onclick="return confirm('Ingin menghapus?');"><button class="btn-hapus">Hapus</button></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal" id="modal-bayar">
  <div class="modal-container">
    <i class="bx bx-x" id="btn-back" style="cursor: pointer;">&times;</i>
    <img src="" alt="Bukti Transfer" id="file-bukti" style="width: 800px; height: auto;">
  </div>
</div>

<div class="modal" id="modal-desain">
  <div class="modal-container">
    <i class="bx bx-x" id="btn-back" style="cursor: pointer;">&times;</i>
    <img src="" alt="Desain" id="file-desain" style="width: 800px; height: auto;">
    <a id="download-btn" download
      style="display: inline-block; margin-top: 10px; text-decoration: none; padding: 10px 20px; background: #007bff; color: #fff; border-radius: 5px;">Download</a>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // button kemas
  // Tambahkan Sweet Alert pada button kemas
  $(document).ready(function () {
    $('#tabel-proses').on('click', '#kemas', function (e) {
      e.preventDefault(); // Menghindari aksi default dari link
      // Memastikan konfirmasi sebelum melanjutkan
      Swal.fire({
        title: 'Kemas Pesanan?',
        text: 'Apakah Anda yakin ingin memindahkan pesanan ke tabel kemas?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, kemas!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Mendapatkan ID
          var id = $(this).data('id-proses');
          // Kirim ID ke server menggunakan AJAX
          $.ajax({
            type: 'POST',
            url: 'php/proses_kemas.php', // Ganti dengan file PHP yang akan menangani penyisipan ke tabel kemas
            data: { id: id },
            success: function (response) {
              if (response === "success") {
                Swal.fire({
                  title: 'Berhasil!',
                  text: 'Data telah berhasil dipindahkan ke tabel kemas.',
                  icon: 'success'
                }).then((result) => {
                  if (result.isConfirmed) {
                    setTimeout(function () {
                      location.reload();
                    }, 2000); // Tunda eksekusi location.reload() selama 2 detik
                  }
                });
              } else {
                Swal.fire({
                  title: 'Gagal!',
                  text: 'Gagal memindahkan data: ' + response,
                  icon: 'error'
                });
              }
            },
            error: function (xhr, status, error) {
              Swal.fire({
                title: 'Terjadi Kesalahan!',
                text: 'Terjadi kesalahan: ' + error,
                icon: 'error'
              });
            }
          });
        }
      });
    });
  });

  // Tambahkan Sweet Alert pada button tolak
  $(document).ready(function () {
    $('#tabel-proses').on('click', '#tolak', function (e) {
      e.preventDefault(); // Menghindari aksi default dari link
      // Memastikan konfirmasi sebelum melanjutkan
      Swal.fire({
        title: 'Tolak Pesanan?',
        text: 'Apakah Anda yakin ingin menolak pesanan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, tolak!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Mendapatkan ID
          var id = $(this).data('id-proses');
          // Kirim ID ke server menggunakan AJAX
          $.ajax({
            type: 'POST',
            url: 'php/proses_tolak.php', // Ganti dengan file PHP yang akan menangani penyisipan ke tabel kemas
            data: { id: id },
            success: function (response) {
              if (response === "success") {
                Swal.fire({
                  title: 'Berhasil!',
                  text: 'Pesanan telah di tolak.',
                  icon: 'success'
                });

                location.reload(); // Refresh halaman setelah data berhasil dipindahkan
              } else {
                Swal.fire({
                  title: 'Gagal!',
                  text: 'Gagal tolak pesanan: ' + response,
                  icon: 'error'
                });
              }
            },
            error: function (xhr, status, error) {
              Swal.fire({
                title: 'Terjadi Kesalahan!',
                text: 'Terjadi kesalahan: ' + error,
                icon: 'error'
              });
            }
          });
        }
      });
    });
  });


  // Tambahkan Sweet Alert pada button selesai
  $(document).ready(function () {
    $('#tabel-kirim').on('click', '#selesai', function (e) {
      e.preventDefault(); // Menghindari aksi default dari link
      // Memastikan konfirmasi sebelum melanjutkan
      Swal.fire({
        title: 'Selesaikan Pesanan?',
        text: 'Apakah Anda yakin ingin menyelesaikan pesanan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, selesaikan!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Mendapatkan ID dari atribut data-id
          var id = $(this).data('id');
          // Kirim ID ke server menggunakan AJAX
          $.ajax({
            type: 'POST',
            url: ' php/proses_selesai.php', // Ganti dengan file PHP yang akan menangani penyisipan ke tabel selesai
            data: { id: id },
            success: function (response) {
              if (response === "success") {
                Swal.fire({
                  title: 'Berhasil!',
                  text: 'Data telah berhasil dipindahkan ke tabel selesai.',
                  icon: 'success'
                }).then((result) => {
                  if (result.isConfirmed) {
                    setTimeout(function () {
                      location.reload();
                    }, 2000); // Tunda eksekusi location.reload() selama 2 detik
                  }
                });
              } else {
                Swal.fire({
                  title: 'Gagal!',
                  text: 'Gagal memindahkan data: ' + response,
                  icon: 'error'
                });
              }
            },
            error: function (xhr, status, error) {
              Swal.fire({
                title: 'Terjadi Kesalahan!',
                text: 'Terjadi kesalahan: ' + error,
                icon: 'error'
              });
            }
          });
        }
      });
    });
  });


  // Tampilkan modal ketika tombol cek bukti diklik
  document.querySelectorAll(".bukti").forEach(function (element) {
    element.addEventListener("click", function (event) {
      event.preventDefault();
      const buktiSrc = event.currentTarget.dataset.bukti;
      document.getElementById("file-bukti").src = "asset/bukti/" + buktiSrc; // Path ke gambar
      document.getElementById("modal-bayar").style.display = "flex"; // Tampilkan modal
    });
  });

  // Tombol silang untuk menutup modal
  document.getElementById("btn-back").addEventListener("click", function () {
    document.getElementById("modal-bayar").style.display = "none"; // Sembunyikan modal
  });

  // Klik di luar modal untuk menutup
  window.addEventListener("click", function (event) {
    const modal = document.getElementById("modal-bayar");
    if (event.target === modal) {
      modal.style.display = "none"; // Sembunyikan modal
    }
  });
  document.querySelectorAll(".desain").forEach(function (element) {
    element.addEventListener("click", function (event) {
      event.preventDefault();
      const desainSrc = event.currentTarget.dataset.desain;
      const filePath = desainSrc ? "asset/desain/" + desainSrc : null;

      const imgElement = document.getElementById("file-desain");
      const downloadBtn = document.getElementById("download-btn");
      const modalContainer = document.getElementById("modal-desain");

      if (filePath) {
        // Jika desainSrc tersedia
        imgElement.src = filePath;
        imgElement.style.display = "block"; // Tampilkan gambar
        downloadBtn.href = filePath;
        downloadBtn.style.display = "inline-block"; // Tampilkan tombol download
      } else {
        // Jika desainSrc tidak tersedia
        imgElement.src = ""; // Kosongkan src
        imgElement.style.display = "none"; // Sembunyikan gambar
        downloadBtn.style.display = "none"; // Sembunyikan tombol download

        // Tampilkan pesan keterangan
        const emptyMessage = document.createElement("p");
        emptyMessage.id = "empty-message";
        emptyMessage.textContent = "Desain belum tersedia.";
        emptyMessage.style.margin = "20px 0";
        emptyMessage.style.textAlign = "center";
        emptyMessage.style.color = "#ff0000";
        modalContainer.querySelector(".modal-container").appendChild(emptyMessage);
      }

      modalContainer.style.display = "flex"; // Tampilkan modal
    });
  });

  // Tombol silang untuk menutup modal
  document.getElementById("btn-back").addEventListener("click", function () {
    const modalContainer = document.getElementById("modal-desain");
    modalContainer.style.display = "none"; // Sembunyikan modal

    // Hapus pesan keterangan jika ada
    const emptyMessage = document.getElementById("empty-message");
    if (emptyMessage) {
      emptyMessage.remove();
    }
  });

  // Klik di luar modal untuk menutup
  window.addEventListener("click", function (event) {
    const modal = document.getElementById("modal-desain");
    if (event.target === modal) {
      modal.style.display = "none"; // Sembunyikan modal

      // Hapus pesan keterangan jika ada
      const emptyMessage = document.getElementById("empty-message");
      if (emptyMessage) {
        emptyMessage.remove();
      }
    }
  });
</script>

<style>
  /* Modal Background */
  .modal {
    display: none;
    /* Awalnya modal tersembunyi */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    /* Warna latar belakang semi-transparan */
    z-index: 9999;
    justify-content: center;
    align-items: center;
  }

  /* Modal Content Container */
  .modal-container {
    position: relative;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    max-width: 90%;
    max-height: 90%;
    overflow: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  /* Close Button */
  #btn-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    color: #333;
    cursor: pointer;
    transition: color 0.3s ease;
  }

  #btn-close:hover {
    color: #ff0000;
  }

  /* Bukti Gambar */
  #file-bukti {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  /* Button Style */
  .btn-edit {
    background-color: #f4b400;
    /* Warna kuning */
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-edit:hover {
    background-color: #e0a800;
  }
</style>