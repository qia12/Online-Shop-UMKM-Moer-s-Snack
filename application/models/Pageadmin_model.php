<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pageadmin_model extends MY_Model
{

    public $table = 'orders';
    // public function getSalesData()
    // {
    //     $query = $this->db->select('title, SUM(qty) as total_sold')
    //         ->from('order_details')
    //         ->join('product', 'order_details.id_product = product.id')
    //         ->group_by('title')
    //         ->get();

    //     return $query->result();
    // }
    // public function getTotalProducts()
    // {
    //     return $this->db->count_all('product');
    // }
}

/* End of file Pageadmin_model.php */
