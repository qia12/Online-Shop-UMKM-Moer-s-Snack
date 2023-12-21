<?php $this->load->view('layouts/_alert'); ?>

<div class="page-body">
    <div class="container-xl" style="padding-top: 50px; padding-bottom: 50px;margin-left: 50px;">
        <div class="wrapper">
            <div class="blurred-text">
                Welcome to Dashboard
            </div>
            <div class="scanner">
                <div class="scanned-text">
                    Welcome to Dashboard
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$today = date('Y-m-d'); // Ambil tanggal hari ini dalam format 'YYYY-MM-DD'

// Eksekusi query untuk menghitung total transaksi pada tanggal hari ini
$this->db->where('date >=', $today . ' 00:00:00');
$this->db->where('date <=', $today . ' 23:59:59');
$totalTransactionToday = $this->db->count_all_results('orders'); // Ganti 'transactions' dengan nama tabel Anda
// echo $totalTransactionToday;

$this->db->select("DATE(date) AS transaction_date, SUM(total) AS total_per_day");
$this->db->where('DATE(date)', $today);
$this->db->where_in('status', array('paid', 'completed', 'delivered'));
$this->db->group_by('DATE(date)');
$query = $this->db->get('orders'); // Ganti 'transactions' dengan nama tabel Anda
$resultDay = $query->result();


$this->db->select("SUM(total) as final_total");
$this->db->where_in('status', array('paid', 'completed', 'delivered'));
$query = $this->db->get('orders');
$resultTotal = $query->row();
$totalAmount = $resultTotal->final_total;

$this->db->select('status');
$this->db->where('status', 'waiting');
$statusWaiting = $this->db->count_all_results('orders');
// echo 'Ini jumlah yang belum bayar: ' . $statusWaiting;
// echo '<br>';

$this->db->select('status');
$this->db->where('status', 'paid');
$statusPaid = $this->db->count_all_results('orders');
// echo 'Ini jumlah yang sudah bayar: ' . $statusPaid;
// echo '<br>';
$this->db->select('status');
$this->db->where('status', 'delivered');
$statusDelivered = $this->db->count_all_results('orders');
// echo 'Ini jumlah yang sudah dikirim: ' . $statusDelivered;
// echo '<br>';
$this->db->select('status');
$this->db->where('status', 'completed');
$statusCompleted = $this->db->count_all_results('orders');
// echo 'Ini jumlah yang sudah selesai: ' . $statusCompleted;
// echo '<br>';
$this->db->select('status');
$this->db->where('status', 'cancel');
$statusCanceled = $this->db->count_all_results('orders');
// echo 'Ini jumlah yang batal: ' . $statusCanceled;

$this->db->select("invoice");
$totalTransaksi = $this->db->count_all_results('orders');

$this->db->select("product.title, SUM(orders_detail.qty) as total_sold");
$this->db->from('product');
$this->db->join('orders_detail', 'product.id = orders_detail.id_product', 'left');
$this->db->group_by('product.id, product.title');
$query = $this->db->get();
$resultSales = $query->result();
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-clock fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><label for="waiting" class="label label-primary">Belum Bayar</label></p>
                    <h6 class="mb-0"><?= $statusWaiting ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-money-bill fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><label for="paid" class="label label-warning">Sudah Bayar</label></p>
                    <h6 class="mb-0"><?= $statusPaid ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-truck fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><label for="delivered" class="label label-success">Dikirim</label></p>
                    <h6 class="mb-0"><?= $statusDelivered ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><label for="completed" class="label" style="color: #ffffff;background-color:#336b87;">Selesai</label></p>
                    <h6 class="mb-0"><?= $statusCompleted ?></h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-ban fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2"><label class="label label-danger" for="cancel">Dibatalkan</label></p>
                    <h6 class="mb-0"><?= $statusCanceled ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Penjualan</p>
                    <h6 class="mb-0">Rp<?= number_format($totalAmount) ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-area fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Transaksi Hari Ini</p>
                    <h6 class="mb-0"><?= $totalTransactionToday ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Total Transaksi</p>
                    <h6 class="mb-0"><?= $totalTransaksi ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Penjualan Hari Ini</p>
                    <?php foreach ($resultDay as $row) : ?>
                        <h6 class="mb-0">Rp<?= number_format($row->total_per_day) ?></h6>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <canvas id="salesChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var productTitles = [];
    var totalSold = [];

    <?php foreach ($resultSales as $row) : ?>
        productTitles.push("<?= $row->title ?>");
        totalSold.push(<?= $row->total_sold ?>);
    <?php endforeach; ?>

    console.log("ini jumlah produk", productTitles);
    console.log("ini jumlah produk", totalSold);

    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: productTitles,
            datasets: [{
                label: 'Jumlah Penjualan',
                data: totalSold,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna latar belakang batang
                borderColor: 'rgba(75, 192, 192, 1)', // Warna border batang
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,

                }
            }
        }
    });
</script>