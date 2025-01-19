<section class="pesanan" id="pesanan">
  <div class="container-pesanan">
    <div class="container-barang">
      <div class="barang">
        <?php
        include("../php/config.php");
        $result = mysqli_query($con, "SELECT * FROM pesanan WHERE id_user = '$id_user' AND status_pesanan = 'dikirim' ORDER BY id DESC");
        if (mysqli_num_rows($result) > 0) {
          while ($proses = mysqli_fetch_assoc($result)):
            ?>
            <div class="barang-bayar">
              <table>
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Ekspedisi</th>
                    <th>Total Harga</th>
                    <th>Resi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <?= $proses['nama_produk'] ?>
                    </td>
                    <td>
                      <?= $proses['ekspedisi'] ?>
                    </td>
                    <td>Rp
                      <?= number_format($proses['final_total']) ?>
                    </td>
                    <td>
                      <?= $proses['resi'] ?>
                    </td>
                    <td>
                      <?php if ($proses['status_pesanan'] == 'dikirim'): ?>
                        <a href="#" class="btn-selesai" data-id="<?= $proses['id'] ?>">
                          <button class="btn" style="background-color: #DAA520; color: white;">Selesaikan
                            Pesanan</button>
                        </a>
                      <?php endif; ?>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="total-price">
                <p>Pesanan sedang dikirim oleh ekspedisi</p>
                <a href="detail/detail-kirim.php?id=<?= $proses["id"] ?>"><button class="btn">Detail</button></a>
              </div>
            </div>
          <?php endwhile;

        } else {
          echo '<div class="kosong">
                   <p>Belum ada pesanan</p>
                   </div>';
        }
        ?>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>$(document).ready(function () {
    // Handle "Selesaikan Pesanan" button click
    $(document).on('click', '.btn-selesai', function (e) {
      e.preventDefault(); // Prevent default link behavior
      const id = $(this).data('id'); // Get the order ID

      // Tambahkan SweetAlert konfirmasi sebelum mengirimkan AJAX request
      Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menyelesaikan pesanan ini?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, selesaikan pesanan',
        cancelButtonText: 'Tidak, batalkan'
      }).then((result) => {
        if (result.isConfirmed) {
          // Kirimkan AJAX request untuk menyelesaikan pesanan
          $.ajax({
            type: 'POST',
            url: '../admin/php/proses_selesai.php', // Menggunakan path relatif ke folder "akun"
            data: { id: id },
            success: function (response) {
              if (response === "success") {
                // Tambahkan SweetAlert sukses setelah mengirimkan AJAX request
                Swal.fire({
                  title: 'Sukses',
                  text: 'Pesanan berhasil diselesaikan.',
                  icon: 'success',
                }).then((result) => {
                  if (result.isConfirmed) {
                    setTimeout(function () {
                      location.reload();
                    }, 2000); // Tunda eksekusi location.reload() selama 2 detik
                  }
                });
              } else {
                // Tambahkan SweetAlert gagal setelah mengirimkan AJAX request
                Swal.fire({
                  title: 'Gagal',
                  text: 'Gagal menyelesaikan pesanan: ' + response,
                  icon: 'error',
                  timer: 2000
                });
              }
            },
            error: function (xhr, status, error) {
              // Tambahkan SweetAlert kesalahan setelah mengirimkan AJAX request
              Swal.fire({
                title: 'Kesalahan',
                text: 'Terjadi kesalahan: ' + error,
                icon: 'error',
                timer: 2000
              });
            }
          });
        }
      });
    });
  });
</script>