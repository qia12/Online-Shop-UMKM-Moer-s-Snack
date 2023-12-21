<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{

  public function index()
  {
    $this->load->library('mypdf');
    $data['data'] = array(
      ['nim' => '123456789', 'name' => 'example name 1', 'jurusan' => 'Teknik Informatika'],
      ['nim' => '123456789', 'name' => 'example name 2', 'jurusan' => 'Jaringan']
    );
    $this->mypdf->generate('Pdf/dompdf', $data, 'laporan-penjualan', 'A4', 'landscape');
  }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
