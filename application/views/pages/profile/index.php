<?php if ($this->session->userdata('role') == 'admin') : ?>
    <main role="main" class="container">
        <?php $this->load->view('layouts/_alert'); ?>
        <div class="row">
            <div class="col-md-10 mx-auto" style="padding: 150px;margin-bottom:150px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="<?= $content->image ? base_url("/assets/img/$content->image") : base_url("/assets/img/user-default.png") ?>" alt="" height="200" width="150">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p>Nama: <?= $content->name ?></p>
                                <p>Email: <?= $content->email ?></p>
                                <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php else : ?>
    <main role="main" class="container-fluid bg-light py-5">
        <?php $this->load->view('layouts/_alert') ?>
        <!-- Page Header Start -->
        <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="display-3 mb-3 animated slideInDown">Profil</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="row" style="margin-left: 50px;">
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="<?= $content->image ? base_url("/assets/img/$content->image") : base_url("/assets/img/user-default.png") ?>" alt="" height="150" weight="150">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <p>Nama: <?= $content->name ?></p>
                                <p>E-Mail: <?= $content->email ?></p>
                                <div style="text-align: center;">
                                    <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-primary rounded-pill py-sm-1 px-sm-3">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif ?>