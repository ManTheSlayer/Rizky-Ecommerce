<section class="produk-section">
    <div class="produk">
        <div class="table">
            <div class="table-box">
                <div class="judul-box">
                    <h1>Stempel</h1>
                    <a href="tambah-stempel.php"><button class="btn-tambah">Tambah Stempel</button></a>
                </div>

                <!-- Table -->
                <table>
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Terjual</th>
                            <th>Bahan</th>
                            <th>Model</th>
                            <th>Berat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            include("../php/config.php");
            $result = mysqli_query($con, "SELECT * FROM produk WHERE kategori = 'banner'");
            while ($row = mysqli_fetch_assoc($result)):
              ?>
                        <tr>
                            <td><img src="asset/img/produk/<?= $row['gambar'] ?>" alt="Image"
                                    style="width: 100px; height: auto;">
                            </td>
                            <td>
                                <?= $row['nama'] ?>
                            </td>
                            <td>Rp
                                <?= number_format($row['harga']) ?>
                            </td>
                            <td>
                                <?= $row['stok'] ?>
                            </td>
                            <td>
                                <?= $row['dibeli'] ?>
                            </td>
                            <td>
                                <?= $row['bahan'] ?>
                            </td>
                            <td>
                                <?= $row['model'] ?>
                            </td>
                            <td>
                                <?= $row['berat'] ?>
                            </td>
                            <td>
                                <?= $row['deskripsi'] ?>
                            </td>
                            <td>
                                <a href="edit-case.php?id=<?= $row['id'] ?>"><button class="btn-edit">Edit</button></a>
                                <a href="hapus-case.php?id=<?= $row["id"] ?>"
                                    onclick="return confirm('Ingin menghapus?');"><button
                                        class="btn-hapus">Hapus</button></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</section>