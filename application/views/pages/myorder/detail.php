<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Detail Pesanan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('myorder') ?>">Riwayat Pesanan</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Detail Pesanan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10 mx-auto" style="margin: 0 auto;padding-left: 40px">
            <div class="row">
                <div class="container-fluid" style="overflow: auto;width:100%">
                    <div class="row">
                        <div class="col-12">
                            <div class="invoice p-3 mb-3">
                                <div class="row">
                                    <div class="container" style="text-align: end;padding:10px;">
                                        <a href="<?= base_url('laporanfpdf/' . $order->invoice) ?>" class="btn btn-success rounded-pill py-sm-2 px-sm-4">Unduh Invoice PDF</a>
                                    </div>
                                    <div class="card-header" style="display: flex;justify-content: space-between;align-items: center; overflow: auto;width:100%">
                                        <strong>Detail Order #<?= $order->invoice ?></strong>
                                        <?php
                                        $originalDate = $order->date; // Tanggal asli dari data
                                        $newDate = date('d/m/Y H:i:s', strtotime($originalDate . ' +1 day')); // Menambahkan 1 hari ke tanggal asli
                                        ?>
                                        <?php if ($order->status == 'waiting') : ?>
                                            <b style="color: red;">Batas Pembayaran: <?= $newDate ?></b><br>
                                        <?php endif ?>
                                        <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                                    </div>
                                    <div class="row invoice-info">
                                        <?php if ($order->status == 'waiting') : ?>
                                            <span class="text-danger" style="font-size: small;">* Pesanan akan otomatis dibatalkan jika melewati batas waktu pembayaran</span>
                                        <?php endif ?>
                                        <div class="col-sm-4 invoice-col" style="padding: 20px;">
                                            <?php foreach ($orders as $row) : ?>
                                                Nama Akun : <strong><?= $row->username ?></strong><br>
                                            <?php endforeach ?>
                                            Nama Penerima : <strong><?= $order->name ?></strong><br>
                                            Alamat: <strong><?= $order->address ?>, <?= $order->city ?>, <?= $order->province ?>, <?= $order->postal_code ?> </strong><br>
                                            No. Telp: <strong><?= $order->phone ?></strong>
                                        </div>
                                    </div>
                                    <div class="table-responsive" style="overflow: auto;width:100%">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Qty</th>
                                                    <th>Harga</th>
                                                    <th>Berat</th>
                                                    <th>Subtotal</th>
                                                    <th>Subtotal Berat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($order_detail as $row) : ?>
                                                    <tr>
                                                        <td><?= $row->title ?></td>
                                                        <td><?= $row->qty ?></td>
                                                        <td>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                                        <td><?= $row->weight ?> gr</td>
                                                        <td>Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                                        <td><?= number_format($row->weight_total) ?> gr</td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-6" style="margin-top: 30px;;">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td colspan="2">Jasa Ekspedisi</td>
                                                        <td><?= strtoupper($order->expedisi) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Jenis Pengiriman</td>
                                                        <td><?= $order->package ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">Estimasi:</td>
                                                        <td id="ongkir"><?= $order->estimate ?></td>
                                                    </tr>
                                                    <?php if ($order->status == 'delivered' && 'completed') : ?>
                                                        <tr>
                                                            <td colspan="2">No. Resi:</td>
                                                            <td id="resi"><?= $order->resi ?></td>
                                                        </tr>
                                                    <?php endif ?>

                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6" style="margin-top: 30px;;">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th colspan="2">Total Harga Produk:</th>
                                                        <th>Rp<?= number_format($order->grand_total, 0, ',', '.') ?>,-</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Total Berat</th>
                                                        <th><?= number_format($order->final_weight, 0, ',', '.') ?> gr</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Ongkos Kirim:</th>
                                                        <th>Rp<?= number_format($order->shipping_cost, 0, ',', '.') ?>,-</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Total</th>
                                                        <th>Rp<?= number_format($order->total, 0, ',', '.') ?>,-</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ($order->status == 'waiting') : ?>
                                        <div class="card-footer">
                                            <a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-primary rounded-pill py-sm-2 px-sm-5">Konfirmasi Pembayaran</a>
                                        </div>
                                    <?php endif ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php if (isset($order_confirm)) : ?>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        Bukti Transfer
                                    </div>
                                    <div class="card-body">
                                        <p>No Rekening: <?= $order_confirm->account_number ?></p>
                                        <p>Atas Nama: <?= $order_confirm->account_name ?></p>
                                        <p>Nominal: Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
                                        <p>Catatan: <?= $order_confirm->note ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url("/assets/img/$order_confirm->image") ?>" alt="" height="200">
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($order->status == 'delivered') : ?>

                        <div class="container" style="text-align: center;">
                            <form action="<?= base_url("myorder/update/$order->invoice") ?>" method="POST">
                                <input type="hidden" name="invoice" value="<?= $order->invoice ?>">
                                <input type="hidden" name="status" value="completed">
                                <button class="btn btn-primary rounded-pill py-sm-2 px-sm-4" type="submit">Produk Sudah Diterima</button>
                            </form>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

    </div>

</main>