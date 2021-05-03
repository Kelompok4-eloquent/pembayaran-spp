<p align="center">
    <h1>E-Pembayaran SPP</h1>
</p>

## Tentang E-Pembayaran SPP

E-Pembayaran SPP adalah sebuah aplikasi untuk mempermudah sebuah sekolah dalam mendata pembayaran SPP para siswa/siswinya, dengan menggunakan aplikasi ini tentunya akan lebih mengurangi biaya dalam pendataan pembayaran SPP, dan mengurangi penggunaan kertas yang dimana pohon adalah GO GREEN bagi kehidupan manusia.

Aplikasi ini memiliki 3 hak akses level login yang akan di buat, yang diantaranya :

Level Admin
- Login
- Logout
- CRUD data siswa
- CRUD data petugas
- CRUD data Kelas
- CRUD data SPP
- Entri Transaksi Pembayaran
- Lihat Histori Pembayaran
- Generate Laporan

Level Petugas
- Login
- Logout
- Entri Transaksi Pembayaran
- Lihat Histori Pembayaran

Level Siswa
- Login
- Logout
- Lihat Histori Pembayaran

"Mengenai tambahan lainnya akan di buat sejalan dengan berjalannya project"

## Cara Install Project E-Pembayaran SPP via GIT

$ git clone https://github.com/Kelompok4-eloquent/pembayaran-spp.git <br>
$ cd pembayaran-spp <br>
$ composer update <br>
$ php artisan migrate --seed <br>
$ php artisan serve <br>

Catatan :
lakukan terlebih dahulu pembuatan database dengan nama spp_db (.env) sebelum melakukan migrate.
