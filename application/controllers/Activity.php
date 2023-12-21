<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Activity extends MY_Controller
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
        $data['title']        = 'Admin: Galery';
        $data['content']    = $this->activity->select(
            [
                'activity.id', 'activity.image', 'activity.title', 'activity.description', 'activity.date', 'user.name AS user_name'
            ]
        )
            ->join('user')
            // ->where('role', 'admin')
            ->get();

        $data['page']        = 'pages/activity/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            $input    = (object) $this->activity->getDefaultValues();
        } else {
            $input    = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName    = url_title($input->title, '-', true) . '-' . date('YmdHis');
            $upload        = $this->activity->uploadImage('image', $imageName);
            if ($upload) {
                $input->image    = $upload['file_name'];
            } else {
                redirect(base_url('activity/create'));
            }
        }

        if (!$this->activity->validate()) {
            $data['title']            = 'Tambah Aktivitas';
            $data['input']            = $input;
            $data['form_action']    = base_url('activity/create');
            $data['page']            = 'pages/activity/form';

            $this->view($data);
            return;
        }

        if ($this->activity->create($input)) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('activity'));
    }

    public function edit($id)
    {
        $data['content'] = $this->activity->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('activity'));
        }

        if (!$_POST) {
            $data['input']    = $data['content'];
        } else {
            $data['input']    = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName    = url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
            $upload        = $this->activity->uploadImage('image', $imageName);
            if ($upload) {
                if ($data['content']->image !== '') {
                    $this->activity->deleteImage($data['content']->image);
                }
                $data['input']->image    = $upload['file_name'];
            } else {
                redirect(base_url("activity/edit/$id"));
            }
        }

        if (!$this->activity->validate()) {
            $data['title']            = 'Ubah Aktivitas';
            $data['form_action']    = base_url("activity/edit/$id");
            $data['page']            = 'pages/activity/form';

            $this->view($data);
            return;
        }


        if ($this->activity->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('activity'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('activity'));
        }
        var_dump($id);
        $activity = $this->activity->where('id', $id)->first();

        if (!$activity) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak dapat ditemukan');
            redirect(base_url('activity'));
        }

        if ($this->activity->where('id', $id)->delete()) {
            $this->activity->deleteImage($activity->image);
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan!');
        }

        redirect(base_url('activity'));
    }
}

/* End of file Activity.php */
