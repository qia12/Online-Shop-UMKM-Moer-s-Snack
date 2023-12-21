<main role="main" class="container" style="margin-bottom: 80px;">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto" style="margin-top: 30px;">
            <div class="card mb-3">
                <div class="card-header">
                    Setting Data Toko
                </div>
                <?php foreach ($content as $row) : ?>
                    <div class="card-body">
                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>">
                        <div class="col-12">
                            <div class="row">
                                <div class="col" style="padding: 10px;">
                                    <label for="">Nama Toko</label>
                                    <input type="text" class="form-control" name="name" value="<?= $row->name ?>" readonly>
                                    <?= form_error('name') ?>
                                </div>
                                <div class="form-group" style="padding: 10px;">
                                    <label for="">Nama Admin Toko</label>
                                    <input type="text" class="form-control" name="name" value="<?= $row->user_name ?>" readonly>
                                    <?= form_error('id_user') ?>
                                </div>
                                <div class="col" style="padding: 10px;">
                                    <label for="">No. Telp</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $row->phone ?>" readonly>
                                    <?= form_error('phone') ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="">Kode Lokasi</label>
                                    <input type="text" class="form-control" name="location" value="<?= $row->location ?>" readonly>
                                    <?= form_error('location') ?>
                                </div>
                                <div class="col">
                                    <label for="">Alamat</label>
                                    <textarea name="address" id="" cols="30" rows="5" class="form-control" readonly><?= $row->address ?></textarea>
                                    <?= form_error('address') ?>
                                </div>

                            </div>

                        </div>
                        <div class="button" style="padding: 10px;">

                            <a type="submit" href="<?= base_url("/setting/edit/$row->id") ?>" class="btn btn-primary">Edit</a>
                        </div>

                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>