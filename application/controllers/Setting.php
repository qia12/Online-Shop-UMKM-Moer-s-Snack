<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $role = $this->session->userdata('role');
        if ($role != 'admin') {
            redirect(base_url('/'));
            return;
        }
    }

    public function index()
    {
        $data['title']        = 'Admin: Setting';
        $data['content']    = $this->setting->select(
            [
                'setting.id', 'setting.name', 'setting.address', 'setting.phone', 'setting.location', 'user.name AS user_name', 'user.id AS user_id'
            ]
        )
            ->join('user')
            ->get();

        $data['page']        = 'pages/setting/index';
        $this->view($data);
    }

    public function edit($id)
    {
        $data['content'] = $this->setting->where('id', $id)->first();
        // var_dump($data);
        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf! Data tidak ditemukan!');
            redirect(base_url('setting'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!$this->setting->validate()) {
            $data['title']            = 'Ubah Kategori';
            $data['form_action']    = base_url("setting/edit/$id");
            $data['page']            = 'pages/setting/form';

            $this->view($data);
            return;
        }

        if ($this->setting->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbaharui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan.');
        }

        redirect(base_url('setting'));
    }
}


// class Update_data extends CI_Controller {
//     $data = array (

//     )
// }

/* End of file Setting.php */
