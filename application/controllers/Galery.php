<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends MY_Controller
{

    public function index($page = null)
    {
        $data['title']    = 'Galery';
        $data['content']    = $this->galery->paginate($page)->get();
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect(base_url('/shop'));
        }
        $data['total_rows']    = $this->galery->count();
        $data['pagination']    = $this->galery->makePagination(
            base_url('galery'),
            2,
            $data['total_rows']
        );
        $data['page']        = 'pages/galery/index';
        $this->view($data);
    }
    // public function search($page = null)
    // {
    //     if (isset($_POST['keyword'])) {
    //         $this->session->set_userdata('keyword', $this->input->post('keyword'));
    //     } else {
    //         redirect(base_url('pages/galery/index'));
    //     }

    //     $keyword    = $this->session->userdata('keyword');
    //     $data['title']        = 'Pencarian: Galeri';
    //     $data['content']    = $this->galery
    //         ->like('activity.date', $keyword)
    //         ->orLike('activity.description', $keyword)
    //         ->paginate($page)
    //         ->get();
    //     $data['total_rows']    = $this->galery->like('activity.date', $keyword)->orLike('activity.description', $keyword)->count();
    //     $data['pagination']    = $this->galery->makePagination(
    //         base_url('galery/search'),
    //         3,
    //         $data['total_rows']
    //     );
    //     $data['page']        = 'pages/galery/index';

    //     $this->view($data);
    // }

    // public function reset()
    // {
    //     $this->session->unset_userdata('keyword');
    //     redirect(base_url('galery'));
    // }
}

/* End of file Galery.php */
