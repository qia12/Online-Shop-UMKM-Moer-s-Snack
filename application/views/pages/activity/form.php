<main role="main" class="container" style="margin-top: 30px;margin-bottom:100px">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header" style="padding: 10px;">
                    <span>Formulir Aktivitas</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Judul</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Deskripsi</label>
                        <?= form_input('description', $input->description, ['class' => 'form-control', 'id' => 'description', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Tanggal</label>
                        <?php
                        $today = date("Y-m-d"); // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
                        ?>
                        <input type="date" name="date" id="date" class="form-control" value="<?= $input->date ?>" max="<?= $today ?>" required>
                        <?= form_error('date') ?>
                    </div>

                    <div class="form-group" style="padding: 10px;">
                        <label for="">Author</label>
                        <?= form_dropdown('id_user', getDropdownListUser('user', ['id', 'name']), $input->id_user, ['class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('id_user') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Gambar</label><br>
                        <?php
                        // Menambahkan atribut required jika image adalah string kosong
                        $requiredAttribute = ($input->image === '') ? 'required' : '';
                        ?>
                        <?= form_upload('image', '', $requiredAttribute) ?>

                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if ($input->image) : ?>
                            <img src="<?= base_url("/assets/img/$input->image") ?>" alt="" height="150">
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