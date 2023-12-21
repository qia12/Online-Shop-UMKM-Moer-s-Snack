<main role="main" class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mb-3">
                <div class="card-header" style="padding: 10px;">
                    <span>Formulir Produk</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Produk</label>
                        <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                        <?= form_error('title') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Deskripsi</label>
                        <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => 4, 'class' => 'form-control']) ?>
                        <?= form_error('description') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Harga</label>
                        <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('price') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Stok</label>
                        <?= form_input(['type' => 'number', 'name' => 'stock', 'value' => $input->stock, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('stock') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Berat</label>
                        <?= form_input(['type' => 'number', 'name' => 'weight', 'value' => $input->weight, 'class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('weight') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Kategori</label>
                        <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control', 'required' => true]) ?>
                        <?= form_error('id_category') ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Gambar</label><br>
                        <?php
                        // Menambahkan atribut required jika image adalah string kosong
                        $requiredAttribute = (!isset($input->image)) ? 'required' : '';
                        ?>
                        <?= form_upload('image', '', $requiredAttribute) ?>

                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/assets/img/$input->image") ?>" alt="" height="150">
                        <?php endif ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/assets/img/$input->image") ?>" alt="" height="150">
                            <p>Nama File: <?= $input->image ?></p>
                        <?php else : ?>
                            <div>
                                <p>Belum Ada File</p>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="form-group" style="padding: 10px;">
                        <label for="">Slug</label>
                        <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                        <?= form_error('slug') ?>
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