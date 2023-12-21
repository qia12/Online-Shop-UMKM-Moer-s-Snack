<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $role = $this->session->userdata('role');
        $is_active = $this->session->userdata('is_active');
        // var_dump($is_active);
        // Periksa apakah pengguna sudah login dan user aktif
        if ($is_login && $is_active == 1) {
            if ($role == 'admin') {
                redirect(base_url('pageadmin'));
            } else {
                redirect(base_url('pagemember'));
            }
            return;
        }
    }

    public function index()
    {
        if (!$_POST) {
            $input    = (object) $this->login->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title']    = 'Login';
            $data['input']    = $input;
            $data['page']    = 'pages/auth/login';

            $this->view($data);
            return;
        }

        if ($this->login->run($input)) {

            $this->session->set_flashdata('success', 'Berhasil melakukan login!');
            $role = $this->session->userdata('role');
            if ($role == 'admin') {
                redirect(base_url('pageadmin'));
            } else {
                redirect(base_url('home'));
            }
        } else {
            $this->session->set_flashdata('error', 'E-Mail atau Password salah atau akun Anda sedang tidak aktif!');
            redirect(base_url('login'));
        }
    }
}

/* End of file Login.php */
