<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-12 mx-auto" style="margin-top: 30px;">
            <div class="row">
                <div class="col-md-12" style="margin: 0 auto;padding-left: 40px">
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Main content -->
                                    <div class="invoice p-3 mb-3">
                                        <!-- Table row -->
                                        <div class="row">
                                            <div class="container" style="text-align: end;padding:10px;">
                                                <a href="<?= base_url('laporanfpdf/' . $order->invoice) ?>" class="btn btn-success rounded-pill py-sm-2 px-sm-4">Unduh Invoice PDF</a>
                                            </div>
                                            <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                                                <strong>Detail Order #<?= $order->invoice ?></strong>
                                                <?php
                                                $originalDate = $order->date; // Tanggal asli dari data
                                                $newDate = date('d/m/Y H:i:s', strtotime($originalDate . ' +1 day')); // Menambahkan 1 hari ke tanggal asli
                                                // echo $originalDate;
                                                ?>
                                                <?php if ($order->status == 'waiting') : ?>
                                                    <b style="color: red;">Batas Pembayaran: <?= $newDate ?></b><br>
                                                <?php endif ?>

                                                <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                                            </div>
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col" style="padding: 20px;">
                                                    <?php foreach ($orders as $row) : ?>
                                                        Nama Akun: <strong><?= $row->username ?></strong><br>
                                                    <?php endforeach ?>
                                                    Nama Penerima: <strong><?= $order->name ?></strong><br>
                                                    Alamat: <strong><?= $order->address ?>, <?= $order->city ?>, <?= $order->province ?> </strong><br>
                                                    No. Telp: <strong><?= $order->phone ?></strong>
                                                </div>
                                            </div>
                                            <div class="col-12 table-responsive">
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
                                            <!-- /.col -->

                                            <!-- /.row -->

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
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="card-footer">
                                                <form action="<?= base_url("order/update/$order->id") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $order->id ?>">
                                                    <input type="hidden" name="qty" id="qty" value="<?= $row->qty ?>">
                                                    <input type="hidden" name="stock" id="stock" value="<?= $row->stock ?>">
                                                    <input type="hidden" name="id_product" id="id_product" value="<?= $row->id_product ?>">

                                                    <div class="input-group">
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="">--Pilih Status Pesanan---</option>
                                                            <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                                                            <option value="paid" <?= $order->status == 'paid' ? 'selected' : '' ?>>Dibayar</option>
                                                            <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>Dikirim</option>
                                                            <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : '' ?>>Batal</option>
                                                            <option value="completed" <?= $order->status == 'completed' ? 'selected' : '' ?>>Selesai</option>
                                                        </select>
                                                    </div>
                                                    <div id="resi-input" class="input-group" style="display: none;">
                                                        <div class="input-group mt-2">
                                                            <input type="input" id="resi" name="resi" value="<?= $order->resi ?>" class="form-control" placeholder="Nomor Resi" required>
                                                        </div>
                                                    </div>
                                                    <div class="input-group" style="margin-top: 10px;">
                                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <script>
                                            // JavaScript untuk menampilkan/sembunyikan input nomor resi
                                            var statusSelect = document.getElementById('status');
                                            var resiInput = document.getElementById('resi-input');

                                            statusSelect.addEventListener('change', function() {
                                                if (statusSelect.value === 'delivered') {
                                                    resiInput.style.display = 'block';
                                                } else {
                                                    resiInput.style.display = 'none';
                                                }
                                            });

                                            // Inisialisasi tampilan awal
                                            if (statusSelect.value === 'delivered') {
                                                resiInput.style.display = 'block';
                                            }
                                        </script>
                                    </div>

                                </div>
                                <!-- /.invoice -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                    <?php if (isset($order_confirm)) : ?>
                        <div class="row mb-3">
                            <div class="col-md-5">
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
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>