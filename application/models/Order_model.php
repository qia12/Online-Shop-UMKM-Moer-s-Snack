<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends MY_Model
{

    public $table = 'orders';
    public function reduceStockOnDelivery($id)
    {
        // Get details of the delivered order
        $details = $this->db->get_where('orders_detail', array('id_orders' => $id))->result();

        foreach ($details as $detail) {
            $this->reduceProductStock($detail->id_product, $detail->qty);
        }
    }

    private function reduceProductStock($id_product, $qty)
    {
        // Get current stock
        $current_stock = $this->db->get_where('product', array('id' => $id_product))->row()->stock;

        // Calculate new stock after reducing
        $new_stock = $current_stock - $qty;

        // Update stock in the database
        $this->db->where('id', $id_product);
        $this->db->update('product', array('stock' => $new_stock));
    }

    public function get_filtered_orders($start_date, $end_date)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file Order_model.php */
