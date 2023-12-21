<main role="main" class="container-fluid bg-light py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Galeri</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Home</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="row">
        <div class="col-md-11 mx-auto" style="margin-left: 50px;">
            <!-- <div class="col-2" style="margin-left: 1140px;">
                <form action="<?= base_url("/galery/search") ?>" method="POST">
                    <div class="input-group">
                        <input type="text" name="keyword" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <a href="<?= base_url("galery/reset") ?>" class="btn btn-primary">
                                <i class="fas fa-eraser"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div> -->
            <div id="portfolio">
                <div class="container-fluid bg-light py-4 mb-5">
                    <div class="container">
                        <div class="row g-0">
                            <?php foreach ($content as $row) : ?>
                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>">
                                        <img class="img-fluid" src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>" />
                                        <div class="portfolio-box-caption">
                                            <?php
                                            // Tanggal dengan format yyyy-mm-dd
                                            $original_date = $row->date;

                                            // Konversi ke format dd-mm-yyyy
                                            $converted_date = date('d-m-Y', strtotime($original_date));
                                            ?>
                                            <div class="project-category text-white-50"><?= $converted_date ?></div>
                                            <div class="project-name"><?= $row->description ?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <?= $pagination ?>
            </nav>
        </div>
    </div>
</main>