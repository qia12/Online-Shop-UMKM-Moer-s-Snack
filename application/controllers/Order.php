<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('login'));
            return;
        }

        $this->db->select('status, date');
        $this->db->from('orders');
        $this->db->where('status', 'waiting');
        $query = $this->db->get();
        $resultSales = $query->result();
        // var_dump($resultSales);


        foreach ($resultSales as $or) {

            $current_datetime = date('d/m/Y H:i:s');
            $originalDate = $or->date; // Tanggal asli dari data
            $newDate = date('d/m/Y H:i:s', strtotime($originalDate . ' +1 day'));

            if ($current_datetime >  $newDate) {
                // Jika waktu sekarang sudah melewati batas pembayaran, ubah status pesanan menjadi "canceled"
                $this->order->where('status', 'waiting')->update(['status' => 'cancel']);
            }
        }
    }

    public function index()
    {
        $data['title']        = 'Admin: Order';
        $data['content']    = $this->order->orderBy('date', 'DESC')->get();
        $data['page']        = 'pages/order/index';

        $this->view($data);
    }

    public function detail($id)
    {
        $data['order']            = $this->order->where('id', $id)->first();
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('order'));
        }

        $this->order->table    = 'orders';
        $data['orders'] = $this->order->select([
            'orders.id_user', 'user.id', 'user.name AS username'
        ])
            ->join('user')
            ->where('orders.id', $id)
            ->get();

        $this->order->table    = 'orders_detail';
        $data['order_detail']    = $this->order->select([
            'orders_detail.id_orders', 'orders_detail.id_product', 'orders_detail.qty', 'orders_detail.weight_total',
            'orders_detail.subtotal', 'product.id AS id_product', 'product.title', 'product.image', 'product.price', 'product.weight', 'product.stock'
        ])
            ->join('product')
            ->where('orders_detail.id_orders', $id)
            ->get();

        if ($data['order']->status !== 'waiting') {
            $this->order->table = 'orders_confirm';
            $data['order_confirm']    = $this->order->where('id_orders', $id)->first();
        }

        $data['page']            = 'pages/order/detail';
        // var_dump($data);
        $this->view($data);
    }


    public function update($id)
    {
        if (!$_POST) {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan!');
            redirect(base_url("order/detail/$id"));
        }

        $dataToUpdate = ['status' => $this->input->post('status')];
        if ($dataToUpdate['status'] == 'delivered') {
            $this->order->reduceStockOnDelivery($id);
        }

        // Cek apakah ada resi 
        $resi = $this->input->post('resi');
        if (!empty($resi)) {
            $dataToUpdate['resi'] = $resi;
        }


        if ($this->order->where('id', $id)->update($dataToUpdate)) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui.');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi kesalahan!');
        }

        redirect(base_url("order/detail/$id"));
    }

    public function filter_orders()
    {
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        if ($this->input->post('filter_button')) {
            // Ambil data pesanan yang sesuai dari model
            $data['content'] = $this->order->get_filtered_orders($start_date, $end_date);
            $data['title']        = 'Data Penjualan Online';
        }

        if ($this->input->post('print_button')) {

            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['content'] = $this->order->get_filtered_orders($start_date, $end_date);
            $this->load->library('mypdf');
            $this->mypdf->generate('dompdf', $data, 'laporan-penjualan', 'A4', 'landscape');
        }
        $data['page']        = 'pages/order/index';

        $this->view($data);
        // var_dump($data['content']);
        // Tampilkan halaman view dengan data pesanan yang sesuai
        // $this->view($data);
    }
}

/* End of file Order.php */
