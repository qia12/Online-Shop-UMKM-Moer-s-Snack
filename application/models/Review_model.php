<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends MY_Model
{

    protected $perPage = 5;
    public $table = 'review';

    public function getDefaultValues()
    {
        return [
            'id_user'     => '',
            'name'     => '',
            'title'     => '',
            'image'    => '',
            'description'    => '',
            'domicile'    => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'id_user',
                'label'    => 'User',
                'rules'    => 'required'
            ],
            // [
            //     'field'    => 'name',
            //     'label'    => 'User',
            //     'rules'    => 'trim|required'
            // ],

            [
                'field'    => 'title',
                'label'    => 'Judul',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'description',
                'label'    => 'Deskripsi',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'domicile',
                'label'    => 'Deskripsi',
                'rules'    => 'trim|required'
            ]
        ];

        return $validationRules;
    }
    public function uploadImage($fieldName, $fileName)
    {
        $config    = [
            'upload_path'        => './assets/img',
            'file_name'            => $fileName,
            'allowed_types'        => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'            => 1024,
            'max_width'            => 0,
            'max_height'        => 0,
            'overwrite'            => true,
            'file_ext_tolower'    => true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./assets/img/$fileName")) {
            unlink("./assets/img/$fileName");
        }
    }
}

/* End of file Review_model.php */
