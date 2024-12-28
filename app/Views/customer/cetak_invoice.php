<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Invoice Pembayaran</title>
    <style>
    @media print {
        .no-print {
            display: none;
        }
    }
    </style>
</head>

<body>

    <div style="margin: 20px auto; text-align: center; width: 700px;">
        <h2>Invoice Pembayaran</h2>
        <hr>
        <table cellpadding="10" cellspacing="0" align="center" width="80%">
            <?php foreach($transaksi as $t) : ?>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td><?= $t['nama']; ?></td>
            </tr>
            <tr>
                <th>Merk Mobil</th>
                <td>:</td>
                <td><?= $t['merk']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Rental</th>
                <td>:</td>
                <td><?= $t['tgl_rental']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Kembali</th>
                <td>:</td>
                <td><?= $t['tgl_kembali']; ?></td>
            </tr>
            <tr>
                <th>Biaya Sewa/Hari</th>
                <td>:</td>
                <td>Rp.<?= number_format($t['harga_mobil'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <?php 
    $x = strtotime($t['tgl_kembali']);
    $y = strtotime($t['tgl_rental']);
    $jmlHari = abs(($x - $y) / (60*60*24));
    ?>
                <th>Jumlah Hari</th>
                <td>:</td>
                <td><?= $jmlHari; ?> Hari</td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td>:</td>
                <td>
                    <?php if($t['status_pembayaran'] == '0') : ?>
                    Belum Lunas
                    <?php else : ?>
                    Lunas
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <!-- JUmlah hari * harga_mobil di table mobil -->
                <th>Jumlah Pembayaran</th>
                <td>:</td>
                <td><span
                        class="btn btn-primary btn-sm">Rp.<?= number_format($t['harga_mobil'] * $jmlHari, 0, ',', '.'); ?></span>
                </td>
            </tr>
            <tr>
                <th>Rekening Pembayaran</th>
                <td>:</td>
                <td>
                    <ul style="list-style: none;">
                        <li>BRI.28642836489237</li>
                        <li>BCA.98347289374723</li>
                        <li>Mandiri Syariah.3826482374</li>
                        <li>Mandiri.2863482378</li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <a href="" class="no-print" onclick="window.print()">Cetak</a>
    </div>
</body>

</html>