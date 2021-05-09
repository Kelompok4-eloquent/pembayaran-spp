<p align="center">
    <h1>E-Pembayaran SPP</h1>
</p>

## Tentang E-Pembayaran SPP

E-Pembayaran SPP adalah sebuah aplikasi untuk mempermudah sebuah sekolah dalam mendata pembayaran SPP para siswa/siswinya, dengan menggunakan aplikasi ini tentunya akan lebih mengurangi biaya dalam pendataan pembayaran SPP, dan mengurangi kontak fisik terutama di masa pandemi seperti ini.

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
## Contributors
Contributors pada project pembayaran-spp

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
<!-- prettier-ignore-start -->
<!-- markdownlint-disable -->
<table>
  <tr>
  <td align="center"><a href="https://github.com/Kelompok4-eloquent"><img src="https://avatars.githubusercontent.com/u/83569332?v=4" width="100px;" alt=""/><br /><sub><b>Kelompok4-eloquent</b></sub></a><br /><a href="#coding-Dzaki Ahnaf Z" title="Backend">Pemilik 📂</a></td>
    <td align="center"><a href="https://github.com/dzaki236"><img src="https://avatars.githubusercontent.com/u/61301953?v=4" width="100px;" alt=""/><br /><sub><b>Dzaki 236</b></sub></a><br /><a href="#coding-Dzaki Ahnaf Z" title="Backend">Full tech 💻</a></td>
    <td align="center"><a href="https://github.com/MuhammadIqbalRamadhan"><img src="https://avatars.githubusercontent.com/u/68367755?v=4" width="100px;" alt=""/><br /><sub><b>M Iqbal Ramadhan</b></sub></a><br /><a href="#coding-Iqbal Ramadhan" title="Backend">Backend 💻</a></td>
    <td align="center"><a href="https://github.com/aryayudhazachri22"><img src="https://avatars.githubusercontent.com/u/68361013?v=4" width="100px;" alt=""/><br /><sub><b>Arya Yudha Z</b></sub></a><br /><a href="#coding-Arya Yudha" title="Frontend">Frontend 💻</a></td>
    <td align="center"><a href="https://github.com/reyhanesa"><img src="https://avatars.githubusercontent.com/u/83635584?v=4" width="100px;" alt=""/><br /><sub><b>Reyhan Esa</b></sub></a><br /><a href="#coding-Reyhan" title="Frontend">Partner Designs 🎨</a></td>
    <td align="center"><a href="https://github.com/ichafadilah"><img src="https://avatars.githubusercontent.com/u/70310467?v=4" width="100px;" alt=""/><br /><sub><b>Icha Fadilah</b></sub></a><br /><a href="#coding-Iqbal Ramadhan" title="Designs">Designs 🎨</a></td>
  </tr>
</table>

<!-- markdownlint-enable -->
<!-- prettier-ignore-end -->
<!-- ALL-CONTRIBUTORS-LIST:END -->
## Cara Install dan jalankan Project E-Pembayaran SPP via GIT

```
$ git clone https://github.com/Kelompok4-eloquent/pembayaran-spp.git
$ cd pembayaran-spp
$ cd spp_project
$ composer update
$ php artisan serve
```

Lalu bila ada perubahan silahkan pull,dan cek perubahannya  

```
$ git pull https://github.com/Kelompok4-eloquent/pembayaran-spp.git
$ cd pembayaran-spp
$ cd spp_project
$ composer update
$ php artisan serve
```

Lalu bila Masih ada eror ikuti cara 

```
$ cd pembayaran-spp
$ cd spp_project
$ code .
- buka file `.env.example` lalu copy isinya dan buat file baru dengan nama `.env` di dalam project spp_project .
- setting database di file `.env` lalu berikan nama database `database_spp`, di line 11-15 di file `.env` .
$ php artisan key:generate
$ php artisan config:cache >
$ php artisan cache:clear   >> di tulis 3 3 nya
$ php artisan config:clear >
$ php artisan migrate --seed 
$ php artisan serve
```

<b> Catatan : </b>
lakukan terlebih dahulu pembuatan database dengan nama spp_db / <i>sesuai keinginan (opsional)</i> pada file (.env),sebelum melakukan migrate.

