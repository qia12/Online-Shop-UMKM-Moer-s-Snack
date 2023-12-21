<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Detail Produk</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('shop') ?>">Produk</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Detail Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto;">
            <!-- About Start -->
            <div class="container-xxl py-5">
                <?php foreach ($product as $row) : ?>
                    <div class="container">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                                    <img class="img w-100" width="300" height="650" src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <h1 class="display-5 mb-4"><?= $row->product_title ?></h1>
                                <p class="mb-4"><?= $row->description ?></p>
                                <p><i class="fa fa-check text-primary me-3"></i>Berat: <?= $row->weight ?> gr</p>
                                <p><i class="fa fa-check text-primary me-3"></i>Stok: <?= $row->stock ?> buah</p>
                                <p><strong>Harga:</strong></p>
                                <p class="text-primary me-1" style="font-size: 20px;">Rp<?= number_format($row->price, 0, ',', '.') ?>,-</p>
                                <form action="<?= base_url("/cart/add") ?>" method="post">
                                    <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                    <button class="btn btn-primary rounded-pill py-3 px-5 mt-3">
                                        <input type="number" name="qty" value="1" class="form-control" hidden>
                                        <i class="fa fa-shopping-bag me-2"></i> Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- About End -->
        </div>
    </div>
</main>