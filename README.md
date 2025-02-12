# RizkyPratama-Ecommerce

RizkyPratama-Ecommerce adalah sebuah aplikasi web e-commerce sederhana yang dirancang untuk bisnis percetakan. Aplikasi ini bertujuan untuk mempermudah pelanggan dalam memesan produk cetak secara online.

## Fitur Utama

- **Halaman Utama**: Menampilkan informasi dan produk utama dari Rizky Pratama.
- **Manajemen Produk**: Tambah, ubah, dan hapus produk yang ditawarkan.
- **Keranjang Belanja**: Memungkinkan pelanggan untuk menambahkan produk ke dalam keranjang belanja mereka.
- **Pemesanan Online**: Pelanggan dapat melakukan pemesanan produk secara langsung.
- **Responsif**: Desain web yang kompatibel di berbagai perangkat.

## Teknologi yang Digunakan

- **Backend**: PHP (tanpa framework)
- **Frontend**: HTML, CSS, JavaScript
- **Database**: MySQL

## Instalasi dan Konfigurasi

1. **Clone Repository**
   ```bash
   git clone https://github.com/ManTheSlayer/Rizky-Ecommerce.git
   ```

2. **Pindahkan ke Directory Server Lokal**
   Salin folder hasil clone ke directory server lokal (contoh: `C:\xampp\htdocs\`).

3. **Buat Database**
   - Masuk ke phpMyAdmin.
   - Buat database baru dengan nama `rizky_pratama_ecommerce`.
   - Import file SQL yang terdapat di folder `database` pada repository ini.

4. **Konfigurasi Database**
   - Buka file `config.php` di folder utama proyek.
   - Sesuaikan pengaturan koneksi database:
     ```php
     <?php
     $host = "localhost";
     $user = "root";
     $password = "";
     $database = "rizky_pratama_ecommerce";
     ?>
     ```

5. **Jalankan Aplikasi**
   - Buka browser dan akses: [http://localhost/RizkyPratama-Ecomerce-main/](http://localhost/RizkyPratama-Ecomerce-main/).


## Lisensi

Proyek ini dirilis di bawah lisensi MIT. Silakan lihat file `LICENSE` untuk informasi lebih lanjut.

## Kontak

Jika kamu memiliki pertanyaan atau saran, silakan hubungi kami di:
- **Email**: lukmankhafi06@gmail.com
- **Website**: [Rizky Pratama](http://localhost/RizkyPratama-Ecomerce-main/)

---

Terima kasih telah menggunakan RizkyPratama-Ecommerce. Selamat berbelanja!
