<main role="main" class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header" style="padding: 10px;">
                    <span>Formulir Ulasan</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Title Foto</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Nama Customer</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'id' => 'name', 'autofocus' => true]) ?>
                        <?= form_error('name') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Domisili</label>
                        <?= form_input('domicile', $input->domicile, ['class' => 'form-control', 'id' => 'domicile', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('domicile') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Deskripsi</label>
                        <?= form_input('description', $input->description, ['class' => 'form-control', 'id' => 'description', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Nama Admin</label>
                        <?= form_dropdown('id_user', getDropdownListUser('user', ['id', 'name']), $input->id_user, ['class' => 'form-control']) ?>
                        <?= form_error('id_user') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Gambar</label>
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
                    <div class="button" style="padding: 10px;">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>