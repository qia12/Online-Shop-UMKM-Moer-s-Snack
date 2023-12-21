<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Checkout</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('shop') ?>">Produk</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto;padding-left: 40px">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            <span class="text-danger">Harap teliti kembali sebelum mengklik tombol beli</span>
                        </div>
                        <form action="<?= base_url("/checkout/create") ?>" method="POST">
                            <div class="col-12">
                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Qty</th>
                                                        <th>Harga</th>
                                                        <th>Berat</th>
                                                        <th>Subtotal</th>
                                                        <th>Subtotal Berat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cart as $row) : ?>
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
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">Provinsi</label><br>
                                                    <select class="form-select" name="provinsi" aria-label="Default select example" required>
                                                        <!-- Opsi-opsi untuk provinsi -->
                                                    </select>
                                                    <span class="text-danger" style="font-size: small;">*Pilih Provinsi Terlebih Dahulu</span>
                                                </div>
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">Kota/Kabupaten</label>
                                                    <select class="form-select" name="kota" id="kota" aria-label="Default select example" required>
                                                        <!-- Opsi-opsi untuk kota/kabupaten -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">Expedisi</label>
                                                    <select class="form-select" name="expedisi" aria-label="Default select example" required>
                                                        <!-- Opsi-opsi untuk provinsi -->
                                                    </select>
                                                </div>
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">Jenis Paket</label>
                                                    <select class="form-select" name="paket" aria-label="Default select example" required>
                                                        <!-- Opsi-opsi untuk kota/kabupaten -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">Nama Penerima</label>
                                                    <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Penerima" value="<?= $input->name ?>" required>
                                                    <?= form_error('name') ?>
                                                </div>
                                                <div class="col" style="padding: 10px;">
                                                    <label for="">No. Hp</label>
                                                    <input type="text" class="form-control" name="phone" placeholder="Masukkan No. Hp Penerima" value="<?= $input->phone ?>" required>
                                                    <?= form_error('phone') ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10" style="padding: 10px;">
                                                    <label for="">Alamat Lengkap</label><br>

                                                    <input name="address" id="" cols="30" rows="5" placeholder="Masukkan Alamat Penerima" class="form-control" value="<?= $input->address ?>" required>
                                                    <span class="text-danger" style="font-size: small;">*Mohon Sertakan Nama Kecamatan dan Nama Desa/Kelurahan</span>
                                                    <?= form_error('address') ?>
                                                </div>
                                                <div class="col-2" style="padding: 10px;">
                                                    <label for="">Kode Pos</label>
                                                    <input name="postal_code" id="" cols="30" rows="5" class="form-control" value="<?= $input->postal_code ?>" required>
                                                    <?= form_error('postal_code') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6" style="margin-top: 30px;;">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th colspan="2">Total Harga Produk:</th>
                                                        <th>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.') ?>,-</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Total Berat</th>
                                                        <th><?= number_format(array_sum(array_column($cart, 'weight_total')), 0, ',', '.') ?> gr</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Ongkos Kirim:</th>
                                                        <th id="ongkir"></th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">Total</th>
                                                        <th id="total_bayar"></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <button class="btn btn btn-primary rounded-pill py-sm-2 px-sm-5" style="margin-top:20px;" type="submit">Beli</button>
                                    <div style="display:none">
                                        <input name="estimasi">
                                        <input name="ongkir">
                                        <input name="final_weight" value="<?= array_sum(array_column($cart, 'weight_total')) ?>">
                                        <input name="grand_total" value="<?= array_sum(array_column($cart, 'subtotal')) ?>">
                                        <input name="total_bayar">
                                        <input name="hasilExpedisi">
                                    </div>
                        </form>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    </div>
    </div>

</main>
<script>
    $(document).ready(function() {
        //get provinsi
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                // console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        //get kota
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $(this).find("option:selected").data("id_provinsi");
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: {
                    id_provinsi: id_provinsi_terpilih
                },
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        //get expedisi
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);

                }
            });
        });

        //get paket
        $("select[name=expedisi]").on("change", function() {
            //get expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()
            //get id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr("id_kota");
            //get data total berat
            var total_berat = <?= array_sum(array_column($cart, 'weight_total')) ?>;

            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    // console.log(hasil_paket)
                    $("select[name=paket]").html(hasil_paket);
                    $("input[name=hasilExpedisi]").val(expedisi_terpilih);
                }
            });
        });

        //get ongkir
        $("select[name=paket]").on("change", function() {
            var dataongkir = $("option:selected", this).attr('ongkir');
            var formattedOngkir = parseInt(dataongkir).toLocaleString('id-ID');
            var finalFormattedOngkir = "Rp" + formattedOngkir + ",-";
            $("#ongkir").html(finalFormattedOngkir);
            //menghitung total bayar
            var data_total_bayar = parseInt(dataongkir) + parseInt(<?= array_sum(array_column($cart, 'subtotal')) ?>)
            var formattedBayar = parseInt(data_total_bayar).toLocaleString('id-ID');
            var finalFormattedBayar = "Rp" + formattedBayar + ",-";
            $("#total_bayar").html(finalFormattedBayar);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=total_bayar]").val(data_total_bayar);
            $("input[name=ongkir]").val(dataongkir);

        });


    });
</script>