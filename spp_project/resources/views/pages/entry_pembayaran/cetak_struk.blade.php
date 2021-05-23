<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            /* padding: 0;
            margin: 0; */
            font-family: 'Courier New', Courier, monospace;
        }

        .konten {
            display: flex;
            justify-content: space-between
        }

        .pages {
            padding: 1em;
            width: 30em;
        }

        .kode {
            padding: 1em;
            width: 30em;
        }

    </style>
</head>

<body>
    <div class="konten">
        <div class="pages">
            <h1>Smk Taruna Bhakti</h1>
            <p>Jalan Raya pekapuran RT 02 RW 07,Curug Cimanggis Depok,Jawa Barat, 16953</p>
        </div>
        <div class="kode">
            <h3> <b>Bukti Pembayaran Spp </b> </h3>
        </div>
    </div>

    <div class="konten">
        <div class="pages">
            <p>Diterima dari : {{ $struk->siswa->nama }}</p>
            <p>NIS : {{ $struk->siswa->nis }}</p>
            <p>Kelas : {{($struk->kelas==NULL)?"Belum Di definisikan":$struk->kelas->nama_kelas}}</p>
        </div>
        <div class="kode">
            <p>Tanggal_Bayar : {{ date("j F , Y",strtotime($struk->tanggal_bayar)) }}</p>
            <p>No Transaksi : {{ md5($struk->id_pembayaran) }}</p>
            <p>Petugas : {{ $struk->petugas->nama_petugas }}</p>
        </div>
    </div>
    <hr>
    <br>
    <div class="table">
        <table width="100%">
            <tr>
               <td width="2em">1.</td>
               <th width="1em">SPP TAHUN {{ $struk->tahun_dibayar }} ({{ $struk->bulan_dibayar }})</th>
               <td width="2em">Rp. {{ $struk->jumlah_bayar }}</td>
            </tr>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td width="2em"></td>
                <td width="86em"></td>
                <td width="2em"><b>Jumlah  : Rp. {{ $struk->jumlah_bayar }}</b></td>
             </tr>
        </table>
        <br>
        <table width="100%">
            <tr>
                <td width="2em"></td>
                <td width="131em"></td>
                <td width="2em">Pembayaran : Rp. {{ $struk->jumlah_dibayar }}</td>
             </tr>
        </table>
        <hr>
        <table width="100%">
            <tr>
                <td width="2em"></td>
                <td width="120em"></td>
                <td width="2em">Kembalian : Rp. {{ $struk->jumlah_dibayar - $struk->jumlah_bayar}}</td>
             </tr>
        </table>
        <br>
        <hr>
        <br>
        <table width="100%">
            <tr>
                <td width="2em">Penerima : {{ $petugas->nama_petugas }}</td>
                <td width="1em">Penyetor : {{ $siswa->nama }}</td>
                <td width="2em"></td>
             </tr>
        </table>
        <br>
        <br>
        <br>
        <br>
        <table width="100%">
            <tr>
                <td width="2em">–––––––––––––––</td>
                <td width="1em">–––––––––––––––</td>
                <td width="2em"></td>
             </tr>
        </table>
        <br>
        
    </div>
</body>

</html>
