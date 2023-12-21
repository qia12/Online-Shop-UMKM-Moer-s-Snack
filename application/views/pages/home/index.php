<!-- Carousel Start -->
<?php $this->load->view('layouts/_alert'); ?>
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="/assets/img/1-carousel.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-4">
                                <h1 class="display-2 mb-5 animated slideInDown">Best Choice</h1>
                                <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Produk</a>
                                <?php if (!$this->session->userdata('is_login')) : ?>
                                    <a href="<?= base_url('register') ?>" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Daftar Akun</a>
                                <?php else : ?>
                                    <a href="<?= base_url('myorder') ?>" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Riwayat Pesanan</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/assets/img/2-carousel.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-end">
                            <div class="col-lg-4">
                                <h1 class="display-2 mb-5 animated slideInDown">Unforgettable Taste</h1>
                                <a href="<?= base_url('shop') ?>" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Produk</a>
                                <?php if (!$this->session->userdata('is_login')) : ?>
                                    <a href="<?= base_url('register') ?>" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Daftar Akun</a>
                                <?php else : ?>
                                    <a href="<?= base_url('myorder') ?>" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Riwayat Pesanan</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->


<!-- About Start -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid w-100" src="/assets/img/kolase-fix.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-5 mb-4">Kualitas Terjamin, Rasa Luar Biasa!</h1>
                <p class="mb-4">Sejak tahun 2008 kami berusaha untuk mempersembahkan produk istimewa yang tidak hanya memanjakan lidah Anda, tetapi juga memberikan jaminan kualitas yang tak terbandingkan. Setiap gigitan adalah cermin dedikasi kami terhadap bahan-bahan pilihan dan inovasi rasa yang mengagumkan.

                    Kami mengambil langkah ekstra dalam memastikan bahan-bahan kami berkualitas tinggi dan segar. Setiap produk kami terbuat dari bahan-bahan yang dipilih dengan teliti, memberikan Anda sensasi renyah saat mencoba cemilan kami dan kenikmatan tiada tara. Inilah ciri khas produk kami:</p>
                <p><i class="fa fa-check text-primary me-3"></i>Terjamin Kualitasnya</p>
                <p><i class="fa fa-check text-primary me-3"></i>Memiliki Rasa yang Otentik</p>
                <p><i class="fa fa-check text-primary me-3"></i>Memiliki Varian Rasa yang Unik</p>

            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Feature Start -->
<div class="container-fluid bg-light bg-icon my-5 py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Kelezatan yang Tulus dan Terpercaya</h1>
            <p>Setiap gigitan dari produk kami bukan hanya menghadirkan rasa yang tak tertandingi, tetapi juga memancarkan komitmen kami terhadap kehalalan, keamanan, dan inovasi. Kami bangga mengumumkan bahwa produk kami memiliki segel kepercayaan yang tak tergoyahkan:</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="/assets/img/logo-halal-kemenag.png" alt="">
                    <h4 class="mb-3"> Sertifikasi Halal</h4>
                    <p class="mb-4">Setiap produk kami diproduksi dengan memenuhi standar halal yang ketat, sehingga Anda bisa menikmatinya dengan keyakinan sepenuh hati.</p><br>
                    <strong>No. ID32110000076291220 </strong>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="/assets/img/logo-haki.png" alt="">
                    <h4 class="mb-3">Kepemilikan HAKI</h4>
                    <p class="mb-4">Inovasi kami dilindungi oleh Hak Atas Kekayaan Intelektual (HAKI), menjaga agar produk kami tetap eksklusif dan unik bagi Anda.</p>
                    <strong>No. IDM000574972 </strong>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white text-center h-100 p-4 p-xl-5">
                    <img class="img-fluid mb-4" src="/assets/img/lppom-pirt.png" alt="">
                    <h4 class="mb-3">Sertifikat LP-POM & P-IRT</h4>
                    <p class="mb-4">Produk kami telah melalui pengawasan dan pengujian dari Lembaga Pengawas Obat dan Makanan (LP-POM), menjamin bahwa kualitas dan keamanannya telah diuji dan disetujui serta kami juga memegang Sertifikat Pendaftaran Industri Rumah Tangga (P-IRT), menjadikan setiap produk kami sebagai pilihan yang tidak hanya lezat, tetapi juga aman untuk dinikmati oleh keluarga Anda.</p>
                    <strong>LP-POM No. 011210876000513 </strong><br>
                    <strong>P-IRT No. 2063216010384</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->


<!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-6 mb-5">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Ulasan Pelanggan</h1>
            <p>Di balik setiap gigitan dari produk kami, tersembunyi cerita-cerita kepuasan dari pelanggan setia kami. Mereka telah jatuh cinta dengan rasa autentik dan kelezatan tiada tara yang kami tawarkan. Jadilah saksi dari kebahagiaan mereka yang terpancar dalam setiap ungkapan!</p>
        </div>

        <!-- Elemen carousel ditempatkan di luar loop foreach -->
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <?php foreach ($review as $row) : ?>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4"><?= $row->description ?></p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">- <?= $row->name ?></h5>
                            <span>Our Customer from <?= $row->domicile ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<!-- Testimonial End -->

<!-- Portfolio -->
<div id="portfolio">
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Galeri</h1>
                <p>Di balik setiap hidangan lezat yang kami sajikan, terdapat cerita-cerita inspiratif yang menandai perjalanan kami dalam dunia makanan. Galeri ini adalah jendela ke dalam dunia kami, di mana Anda dapat merasakan semangat, dedikasi, dan pencapaian yang telah kami rasakan.</p>
            </div>
            <div class="row g-0 wow fadeInUp" data-wow-delay="0.1s">
                <?php $count = 0; ?>
                <?php foreach ($activity as $row) : ?>
                    <?php $count++; ?>
                    <?php if ($count <= 3) : ?>
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>" title="Our Galery">
                                <img class="img-fluid" src="<?= $row->image ? base_url("/assets/img/$row->image") : base_url("/assets/img/product-1.jpg") ?>" alt="..." />
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
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                <a class="btn btn-primary rounded-pill py-3 px-5" style="margin-top: 20px;" href="<?= base_url('galery') ?>">Lihat lebih Banyak</a>
            </div>
        </div>
    </div>
</div>





<!-- Blog End -->