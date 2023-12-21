<?php if ($this->session->userdata('role') == 'admin') : ?>
    <main role="main" class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Formulir Profile
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Nama</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">E-Mail</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                            <?= form_error('email') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Password</label>
                            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                            <span class="text-danger" style="font-size: small;">* Masukkan Password Baru Jika Ingin Mengubah Password</span>
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Foto</label>
                            <br>
                            <?= form_upload('image') ?>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                            <?php if (isset($input->image)) : ?>
                                <img src="<?= base_url("/assets/img/$input->image") ?>" alt="" height="150">
                                <p>Nama File: <?= $input->image ?></p>
                            <?php else : ?>
                                <div>
                                    <p>Belum Ada</p>
                                </div>
                            <?php endif ?>
                        </div>
                        <div style="padding:20px;">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        <?= form_close() ?>
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
                <h1 class="display-3 mb-3 animated slideInDown">Ubah Profil</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('profile') ?>">Profil</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page"> Ubah Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Formulir Profil
                    </div>
                    <div class="card-body">
                        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Nama</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">E-Mail</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
                            <?= form_error('email') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Password</label>
                            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 karakter']) ?>
                            <span class="text-danger" style="font-size: small;">* Masukkan Password Baru Jika Ingin Mengubah Password</span>
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <label for="">Foto</label>
                            <br>
                            <?= form_upload('image') ?>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>
                            <?php if (isset($input->image)) : ?>
                                <img src="<?= base_url("/assets/img/$input->image") ?>" alt="" height="150">
                            <?php endif ?>
                        </div>
                        <div style="text-align: center;padding:20px;">
                            <button type="submit" class="btn btn-primary rounded-pill py-sm-2 px-sm-4">Simpan</button>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endif ?>