<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>
    <!-- <img src="/assets/img/logo-saya.jpg" style="position: absolute; width: 60px; height: auto;"> -->
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    LAPORAN PENJUALAN ONLINE MOER'S SNACK
                    <br>BEKASI INDONESIA
                </span>
            </td>
        </tr>
    </table>

    <hr class="line-title">
    <p align="center">
        LAPORAN DATA PENJUALAN ONLINE<br>
        <b>Periode: <?= date('d/m/Y', strtotime($start_date)) ?> sampai <?= date('d/m/Y', strtotime($end_date)) ?></b>
    </p>
    <div style="position: relative;">
        <table border="1" class="table table-bordered" style="margin-left: auto;margin-right:auto;">
            <tr>
                <th>No.</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pemesan</th>
                <th>Total</th>
                <th>Ekspedisi</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Status</th>
            </tr>
            <?php $no = 1;
            foreach ($content as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->invoice ?></td>
                    <td><?= date('d/m/Y', strtotime($row->date)) ?></td>
                    <td><?= $row->name ?></td>
                    <td>Rp<?= number_format($row->grand_total, 0, ',', '.') ?>,-</td>
                    <td><?= $row->expedisi ?></td>
                    <td><?= $row->city ?></td>
                    <td><?= $row->province ?></td>
                    <td><?= $row->status ?></td>

                </tr>
            <?php endforeach ?>
        </table>
        <div align="center" style="position: absolute;
        bottom: 0;
        right: 0;
        margin: 85px;">
            Diketahui Oleh,
            <br>
            <br>
            <br>
            (Bagian Penjualan)
        </div>
    </div>
</body>

</html>