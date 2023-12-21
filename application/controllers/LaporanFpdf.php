<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporanfpdf extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function index($invoice)
    {
        error_reporting(0); // Menghilangkan pesan error (cocok untuk produksi)

        // Load the data from the database
        // Load library FPDF
        $this->load->library('fpdf');

        // Buat objek FPDF
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        // Query ke database untuk mengambil data order berdasarkan nomor invoice
        $this->db->where('invoice', $invoice);
        $order = $this->db->get('orders')->result();


        // Ambil detail order berdasarkan nomor invoice
        $this->db->join('orders', 'orders.id = orders_detail.id_orders'); // Menghubungkan tabel 'orders' dengan 'orders_detail' menggunakan kolom 'id' dari 'orders' dan 'order_id' dari 'orders_detail'
        $this->db->join('product', 'product.id = orders_detail.id_product'); // Menghubungkan tabel 'orders' dengan 'orders_detail' menggunakan kolom 'id' dari 'orders' dan 'order_id' dari 'orders_detail'
        $this->db->where('orders.invoice', $invoice); // Menggunakan 'invoice' dari tabel 'orders'
        $detailOrders = $this->db->get('orders_detail')->result(); // Mengambil hasil query dari tabel 'orders_detail'


        // Tambahkan konten laporan menggunakan objek FPDF
        // Header
        $pdf->Cell(250, 10, 'Invoice MOERS SNACK', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 10);

        foreach ($order as $data) {
            $pdf->Cell(40, 10, 'Nama: ' . $data->name, 0, 1, 'L'); // Add 1 as the last parameter to move to the next line
            $pdf->Cell(40, 10, 'Alamat: ' . $data->address, 0, 1, 'L');
            $pdf->Cell(40, 10, 'Kota: ' . $data->city, 0, 1, 'L');
            $pdf->Cell(40, 10, 'Provinsi: ' . $data->province, 0, 1, 'L');
            $pdf->Cell(29, 10, 'Kode Pos: ' . $data->postal_code, 0, 1, 'R');
            $pdf->Cell(43, 10, 'No. Telp: ' . $data->phone, 0, 1, 'R');




            // Add space between orders
            $pdf->Ln(10);
        }

        // Table header
        $pdf->Cell(50, 10, 'Produk', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Qty', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Harga', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Subtotal', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Subtotal Berat', 1, 1, 'C');

        // Data Rows (Orders Detail)
        foreach ($detailOrders as $data) {
            $pdf->Cell(50, 10, $data->title, 1, 0);
            $pdf->Cell(20, 10, $data->qty, 1, 0, 'C');
            $pdf->Cell(30, 10, $data->price, 1, 0, 'R');
            $pdf->Cell(30, 10, $data->subtotal, 1, 0, 'R');
            $pdf->Cell(30, 10, $data->weight_total, 1, 1, 'R');
        }

        // ...

        // ...

        // Table header for Orders
        $pdf->SetFont('Arial', 'B', 10);

        // Data Rows (Orders)
        foreach ($order as $data) {
            // Posisi sebelah kiri
            $pdf->Cell(40, 10, 'Invoice: ' . $data->invoice, 0, 0, 'L');
            $pdf->Cell(120, 10, 'Expedisi: ' . $data->expedisi, 0, 1, 'R');
            $pdf->Cell(40, 10, 'Package: ' . $data->package, 0, 0, 'L');
            $pdf->Cell(120, 10, 'Estimate: ' . $data->estimate, 0, 1, 'R');

            // Posisi sebelah kanan
            $pdf->SetX($pdf->GetX() + 80); // Geser ke sebelah kanan sejauh 80 unit dari posisi sebelumnya
            $pdf->Cell(80, 10, 'Total Bayar: ' . $data->grand_total, 0, 1, 'R');
            $pdf->Cell(40, 10, 'Total Berat: ' . $data->final_weight, 0, 0, 'L');
            $pdf->Cell(120, 10, 'Ongkos Kirim: ' . $data->shipping_cost, 0, 1, 'R');
            $pdf->Cell(40, 10, 'Total: ' . $data->total, 0, 1, 'L');

            // Kembali ke posisi awal (kiri)
            $pdf->SetX($pdf->GetX() - 80);

            // Add space between orders
            $pdf->Ln(10);
        }


        // ...




        // // Create a new PDF instance
        // $pdf = new FPDF('L', 'mm', 'Letter');
        // $pdf->AddPage();
        // $pdf->SetFont('Arial', 'B', 16);

        // // Header
        // $pdf->Cell(40, 10, 'Invoice MOERS SNACK', 0, 1, 'C');
        // $pdf->SetFont('Arial', '', 10);

        // // Table header
        // $pdf->Cell(20, 10, 'Invoice', 1, 0, 'C');
        // $pdf->Cell(50, 10, 'Produk', 1, 0, 'C');
        // $pdf->Cell(20, 10, 'Qty', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Harga', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Subtotal', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Subtotal Berat', 1, 1, 'C');

        // // Data Rows (Orders Detail)
        // foreach ($detailOrders as $data) {
        //     $pdf->Cell(20, 10, $data->invoice, 1, 0, 'C');
        //     $pdf->Cell(50, 10, $data->product, 1, 0);
        //     $pdf->Cell(20, 10, $data->qty, 1, 0, 'C');
        //     $pdf->Cell(30, 10, $data->price, 1, 0, 'R');
        //     $pdf->Cell(30, 10, $data->subtotal, 1, 0, 'R');
        //     $pdf->Cell(30, 10, $data->weight_total, 1, 1, 'R');
        // }

        // // Table header for Orders
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(50, 10, 'Jasa Ekspedisi', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Jenis Pengiriman', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Estimasi', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Total Harga Produk', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Total Berat', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Ongkos Kirim', 1, 0, 'C');
        // $pdf->Cell(40, 10, 'Total', 1, 1, 'C');

        // // Data Rows (Orders)
        // foreach ($orders as $data) {
        //     $pdf->Cell(50, 10, $data->expedisi, 1, 0);
        //     $pdf->Cell(40, 10, $data->package, 1, 0);
        //     $pdf->Cell(40, 10, $data->estimate, 1, 0, 'C');
        //     $pdf->Cell(40, 10, $data->grand_total, 1, 0, 'R');
        //     $pdf->Cell(40, 10, $data->final_weight, 1, 0, 'R');
        //     $pdf->Cell(40, 10, $data->shipping_cost, 1, 0, 'R');
        //     $pdf->Cell(40, 10, $data->total, 1, 1, 'R');
        // }

        // // Output the PDF
        $pdf->Output();
    }
}
