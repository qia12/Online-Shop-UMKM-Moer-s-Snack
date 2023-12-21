<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Status Checkout</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('checkout') ?>">Checkout</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Status Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto;padding-left: 40px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Checkout Berhasil
                        </div>
                        <div class="card-body">
                            <h5>Nomer Order: <?= $content->invoice ?></h5>
                            <p>Terima kasih, sudah berbelanja.</p>
                            <p>Silakan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara:</p>
                            <ol>
                                <li>Lakukan pembayaran pada rekening <strong>BRI 7292 0101 0567 501</strong> a/n Nibras Alfaruqiyah</li>
                                <li>Sertakan keterangan dengan nomor order: <strong><?= $content->invoice ?></strong></li>
                                <li>Total pembayaran: <strong>Rp<?= number_format($content->total, 0, ',', '.') ?>,-</strong></li>
                            </ol>
                            <p>Jika sudah, silakan kirimkan bukti transfer di halaman konfirmasi atau bisa <a href="<?= base_url("/myorder/detail/$content->invoice") ?>">klik disini</a>!</p>
                            <a href="<?= base_url('home') ?>" class="btn btn-secondary rounded-pill py-sm-2 px-sm-4"><i class="fas fa-angle-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>