<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Keranjang Belanja</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('shop') ?>">Produk</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10 mx-auto" style="margin: 0 auto;padding-left: 50px">
            <div class="row">
                <div class="col-md-10">
                    <div class="card mb-3">
                        <div class="card-header">
                            Keranjang Belanja <?= $this->session->userdata('name') ?>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($content as $row) : ?>
                                        <tr>
                                            <td>
                                                <p><img src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url('/assets/img/product-1.jpg') ?>" alt="" height="50"> <strong><?= $row->title ?></strong></p>
                                            </td>
                                            <td class="text-center">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                            <td>
                                                <form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                                    <div class="input-group">
                                                        <input type="number" name="qty" class="form-control text-center" value="<?= $row->qty ?>">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-info" type="submit" data-toggle="tooltip" data-placement="top" title="Simpan Perubahan Jumlah Produk"><i class="fas fa-check"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="text-center">Rp<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
                                            <td>
                                                <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')" data-toggle="tooltip" data-placement="top" title="hapus Data"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <td colspan="3"><strong>Total:</strong></td>
                                        <td class="text-center"><strong>Rp<?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer" style="display: flex;justify-content: space-between;">
                            <a href="<?= base_url('/shop') ?>" class="btn btn-secondary rounded-pill py-sm-2 px-sm-4"><i class="fas fa-angle-left"></i> Kembali Belanja</a>
                            <a href="<?= base_url('/checkout') ?>" class="btn btn-primary rounded-pill py-sm-2 px-sm-4">Checkout <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>