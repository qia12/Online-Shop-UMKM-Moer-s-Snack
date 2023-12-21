<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Review extends MY_Controller
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
        $data['title']        = 'Admin: Review';
        $data['content']    = $this->review->select(
            [
                'review.id', 'review.name', 'review.image', 'review.title', 'review.description', 'review.domicile', 'user.name AS user_name'
            ]
        )
            ->join('user')
            ->where('role', 'admin')
            ->get();

        $data['page']        = 'pages/review/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input    = (object) $this->review->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName    = url_title($input->title, '-', true) . '-' . date('YmdHis');
            $upload        = $this->review->uploadImage('image', $imageName);
            if ($upload) {
                $input->image    = $upload['file_name'];
            } else {
                redirect(base_url('review/create'));
            }
        }

        if (!$this->review->validate()) {
            $data['title']            = 'Tambah Review';
            $data['input']            = $input;
            $data['form_action']    = base_url('review/create');
            $data['page']            = 'pages/review/form';

            $this->view($data);
            return;
        }

        if ($this->review->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('review'));
    }

    public function edit($id)
    {
        $data['content'] = $this->review->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('review'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName    = url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
            $upload        = $this->review->uploadImage('image', $imageName);
            if ($upload) {
                if ($data['content']->image !== '') {
                    $this->review->deleteImage($data['content']->image);
                }
                $data['input']->image    = $upload['file_name'];
            } else {
                redirect(base_url("review/edit/$id"));
            }
        }

        if (!$this->review->validate()) {
            $data['title']            = 'Ubah Review';
            $data['form_action']    = base_url("review/edit/$id");
            $data['page']            = 'pages/review/form';

            $this->view($data);
            return;
        }


        if ($this->review->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('review'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('review'));
        }
        var_dump($id);
        $review = $this->review->where('id', $id)->first();

        if (!$review) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('review'));
        }

        if ($this->review->where('id', $id)->delete()) {
            $this->review->deleteImage($review->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
        }

        redirect(base_url('review'));
    }
}

/* End of file Review.php */
