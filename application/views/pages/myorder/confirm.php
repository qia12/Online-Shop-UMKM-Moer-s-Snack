<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Konfirmasi Pesanan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Konfirmasi Pesanan</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="row">
        <div class="col-md-10" style="margin: 0 auto;padding-left: 40px">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;align-items: center;">
                            <div>
                                Konfirmasi Order #<?= $order->invoice ?>
                            </div>
                            <div>
                                <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                            </div>
                        </div>
                        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                        <?= form_hidden('id_orders', $order->id); ?>
                        <div class="card-body">
                            <div class="form-group" style="padding: 10px;">
                                <label for="">Transaksi</label>
                                <input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
                            </div>
                            <div class="form-group" style="padding: 10px;">
                                <label for="">Dari Rekening a/n</label>
                                <input type="text" name="account_name" value="<?= $input->account_name ?>" class="form-control">
                                <?= form_error('account_name') ?>
                            </div>
                            <div class="form-group" style="padding: 10px;">
                                <label for="">No Rekening</label>
                                <input type="text" name="account_number" value="<?= $input->account_number ?>" class="form-control">
                                <?= form_error('account_number') ?>
                            </div>
                            <div class="form-group" style="padding: 10px;">
                                <label for="">Sebesar</label>
                                <input type="number" name="nominal" value="<?= $input->nominal ?>" class="form-control">
                                <?= form_error('nominal') ?>
                            </div>
                            <div class="form-group" style="padding: 10px;">
                                <label for="">Catatan</label>
                                <textarea name="note" id="" cols="30" rows="5" class="form-control">-</textarea>
                            </div>
                            <div class="form-group" style="padding: 10px;">
                                <label for="">Bukti Transfer</label> <br>
                                <input type="file" name="image" id="">
                                <?php if ($this->session->flashdata('image_error')) : ?>
                                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary rounded-pill py-sm-2 px-sm-4">Saya Sudah Transfer</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>