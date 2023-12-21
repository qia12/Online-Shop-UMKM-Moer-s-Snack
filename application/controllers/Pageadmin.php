<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pageadmin extends MY_Controller
{
    public function index()
    {
        $data['title'] = 'Homepage';
        $data['page'] = 'pages/home/pageadmin';
        $data['content']    = $this->pageadmin->select(
            [
                'orders.invoice', 'orders.total', 'orders.status', 'orders.date'
            ]
        )
            ->get();
        // $data['salesData'] = $this->pageadmin->getSalesData();
        $this->view($data);
    }
}

/* End of file Home.php */
