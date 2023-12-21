<?php if ($this->session->userdata('role') == 'admin') : ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
        </a>
        <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
        </a>
        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <small class="fas fa-user text-body"></small>
                    <span class="d-none d-lg-inline-flex"><?= $this->session->userdata('name') ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                    <a href="<?= base_url('profile') ?>" class="dropdown-item">My Profile</a>
                    <a href="<?= base_url('setting') ?>" class="dropdown-item">Settings</a>
                    <a href="<?= base_url('logout') ?>" class="dropdown-item">Log Out</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
<?php else : ?>
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-7 px-3 text-start">
                <a style="color: #000000;" href="https://www.google.com/maps/dir//moer's+snack/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2e698ecdbe25da49:0x5efadb4cb30882d7?sa=X&ved=2ahUKEwiDodzC-t6AAxXhxzgGHaasA9AQ9Rd6BAhIEAA&ved=2ahUKEwiDodzC-t6AAxXhxzgGHaasA9AQ9Rd6BAhREAM"><small><i class="fa fa-map-marker-alt me-2"></i>Jl. Anggrek Raya Blok T No. 418, Karang Satria, Tambun Utara, Bekasi</small></a>
                <small style="color: #000000;" class="ms-4"><i class="fa fa-envelope me-2"></i>moerssnack@gmail.com</small>
                <a style="color: #000000;" href="https://wa.me/628159333221"><small class="ms-4"><i class="fa fa-phone me-2"></i>+62 815-9333-221</small></a>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <small style="color: #000000;">Temukan Kami:</small>
                <a style="color: #000000;" class="text-body ms-3" href="https://www.instagram.com/moerssnack/"><i style="color: #000000;" class="fab fa-instagram"></i></a>
                <a style="color: #000000;" class="text-body ms-3" href="https://www.facebook.com/moers.tini/"><i style="color: #000000;" class="fab fa-facebook-f"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="<?= base_url('home') ?>" class="navbar-brand ms-4 ms-lg-0">
                <img src="/assets/img/logo-baru.png" width="100" height="50" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="<?= base_url('home') ?>" class="nav-item nav-link active"><small class="fa-solid fa-house fa-bounce text-body"></small> Beranda</a>
                    <a href="<?= base_url('galery') ?>" class="nav-item nav-link active"><small class="fa-sharp fa-solid fa-images fa-bounce text-body"></small> Galeri </a>
                    <a href="<?= base_url('shop') ?>" class="nav-item nav-link active"><small class="fa-solid fa-cube fa-bounce text-body"></small> Produk</a>
                    <a href="<?= base_url('cart') ?>" class="nav-item nav-link"> <small class="fas fa-shopping-bag fa-bounce text-body"></small> Keranjang (<?= getCart(); ?>)</a>
                    <?php if (!$this->session->userdata('is_login')) : ?>
                        <a href="<?= base_url('login') ?>" class="nav-item nav-link"> <small class="fas fa-user fa-bounce text-body"></small> Masuk</a>
                    <?php else : ?>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <small class="fas fa-user fa-bounce text-body"></small>
                                <!-- <img class="rounded-circle" src="assets/img/testimonial-1.jpg" alt="" style="width: 20px; height: 20px;"> -->
                                <?= $this->session->userdata('name') ?></a>
                            <div class="dropdown-menu m-0">
                                <a href="<?= base_url('profile') ?>" class="dropdown-item"><small class="fa-solid fa-id-badge text-body"></small> Profil </a>
                                <a href="<?= base_url('myorder') ?>" class="dropdown-item"><small class="fa-solid fa-clipboard-list text-body"></small> Pesanan Saya</a>
                                <a href="<?= base_url('logout') ?>" class="dropdown-item"><small class="fa-solid fa-right-from-bracket text-body"></small> Keluar</a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
<?php endif ?>