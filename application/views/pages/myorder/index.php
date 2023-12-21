<main role="main" class="container-fluid bg-light bg-icon py-5">
    <?php $this->load->view('layouts/_alert') ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Riwayat Pesanan</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="<?= base_url('home') ?>">Beranda</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Riwayat Pesanan</li>
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
                        <div class="card-header">
                            Daftar Pesanan
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: auto;width:100%">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($content as $row) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?= base_url("/myorder/detail/$row->invoice") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                                </td>
                                                <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                                <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                                <td>
                                                    <?php $this->load->view('layouts/_status', ['status' => $row->status]);  ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>