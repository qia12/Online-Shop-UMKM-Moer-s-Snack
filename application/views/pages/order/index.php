<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto" style="margin-top: 30px;">
            <div class="col-md-12 mx-auto" style="margin-bottom: 20px">
                <div class="card mb-3">
                    <div class="card-header">
                        Filter Data Order
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url("order/filter_orders") ?>" method="POST">
                            <div class="row">
                                <?php
                                $today = date("Y-m-d"); // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
                                ?>
                                <div class="col-md-4">
                                    <span>Start Date</span>
                                    <input type="date" class="form-control pickdate date_range_filter" max="<?= $today ?>" id="start_date" name="start_date" required>
                                </div>
                                <div class="col-md-4">
                                    <span>End Date</span>
                                    <input type="date" class="form-control pickdate date_range_filter" max="<?= $today ?>" id="end_date" name="end_date" required>
                                </div>
                                <div class="col-md-5">
                                    <br>
                                    <button type="submit" id="filter_button" name="filter_button" class="btn btn-primary" value="Filter">Filter</button>
                                    <button type="submit" id="print_button" name="print_button" class="btn btn-primary" value="Cetak Laporan">Cetak Laporan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    Order
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="overflow: auto;">
                        <table id="table_id" class="table card-table table-vcenter text-nowrap datatable" style="width: 800px;">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Tanggal</th>
                                    <th>Pemesan</th>
                                    <th>Total</th>
                                    <th>Expedisi</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url("/order/detail/$row->id") ?>"><strong>#<?= $row->invoice ?></strong></a>
                                        </td>
                                        <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                        <td><?= $row->name ?></td>
                                        <td>Rp<?= number_format($row->total, 0, ',', '.') ?>,-</td>
                                        <td><?= $row->expedisi ?></td>
                                        <td><?= $row->city ?></td>
                                        <td><?= $row->province ?></td>
                                        <td>
                                            <?php
                                            $this->load->view('layouts/_status', ['status' => $row->status]);  ?>
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
</main>