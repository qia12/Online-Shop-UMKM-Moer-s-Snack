<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Produk</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10 mx-auto" style="margin-left: 50px;">
            <div class="row">
                <style>
                    .custom-card {
                        background-color: #763626;
                        color: #F7F8FC;

                    }
                </style>
                <div class="col-md-8 offset-md-1 mb-2">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center" style="height: 7px;">
                                <div>
                                    Kategori: <strong><?= isset($category) ? $category : 'Semua Kategori' ?></strong>
                                </div>
                                <div>
                                    <span style="color: #F7F8FC;">
                                        Urutkan Harga:
                                        <a href="<?= base_url("/shop/sortby/asc") ?>" class="badge badge-primary"><strong>Termurah</strong></a>
                                        <a href="<?= base_url("/shop/sortby/desc") ?>" class="badge badge-primary"><strong>Termahal</strong></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <form action="<?= base_url("/shop/search") ?>" method="POST">
                        <div class="input-group">
                            <input type="text" name="keyword" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" class="form-control">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url("shop/reset") ?>" class="btn btn-primary">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 wow slideInRight" data-wow-delay="0.1s" style="margin-left: 130px;">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-secondary border-2" href="<?= base_url("shop") ?>">Semua Kategori</a>
                    </li>
                    <?php foreach (getCategories() as $category) : ?>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-secondary border-2" href="<?= base_url("/shop/category/$category->slug") ?>"><?= $category->title ?> </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>

            <div class="container-xxl py-5">
                <div class="row g-4" style="margin-bottom: 20px;">
                    <?php $no = 0; ?>
                    <?php foreach ($content as $row) : $no++; ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div id="card-product" class="product-item wow fadeInUp" data-wow-delay="<? $no ?>s">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img w-100" src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-8.jpg") ?>" alt="" width="350" height="350">
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2"><?= $row->product_title ?></a>
                                    <span class="text-primary me-1"><strong>Rp<?= number_format($row->price, 0, ',', '.') ?>,-</strong></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body btn btn-sm" href="<?= base_url("shop/detail/" . (int)$row->id) ?>" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-eye text-primary me-2"></i>View detail
                                        </a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <form action="<?= base_url("/cart/add") ?>" method="post">
                                            <input type="hidden" name="id_product" value="<?= $row->id ?>">
                                            <button class="text-body btn btn-sm">
                                                <input type="number" name="qty" value="1" class="form-control" hidden>
                                                <i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart
                                            </button>
                                        </form>
                                    </small>

                                </div>
                            </div>
                        </div>
                        <?php $no += 0.2; // Tambahkan 0.2 pada setiap iterasi 
                        ?>
                    <?php endforeach ?>
                </div>
                <nav aria-label="Page navigation example">
                    <?= $pagination ?>
                </nav>
            </div>

        </div>
    </div>
</main>