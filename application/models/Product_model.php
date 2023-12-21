<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends MY_Model
{

    // protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'id_category'    => '',
            'slug'            => '',
            'title'            => '',
            'description'    => '',
            'price'            => '',
            'image'            => '',
            'is_available'    => 1,
            'weight'    => '',
            'stock'         => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'id_category',
                'label'    => 'Kategori',
                'rules'    => 'required'
            ],
            [
                'field'    => 'slug',
                'label'    => 'Slug',
                'rules'    => 'trim|required|callback_unique_slug'
            ],
            [
                'field'    => 'title',
                'label'    => 'Nama Produk',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'description',
                'label'    => 'Deskripsi',
                'rules'    => 'required'
            ],
            [
                'field'    => 'price',
                'label'    => 'Harga',
                'rules'    => 'trim|required|numeric'
            ],
            [
                'field'    => 'stock',
                'label'    => 'Stok',
                'rules'    => 'trim|required|numeric'
            ],
            [
                'field'    => 'weight',
                'label'    => 'Berat',
                'rules'    => 'trim|required|numeric'
            ],
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
            $this->session->set_flashdata('image_error');
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./assets/img/$fileName")) {
            unlink("./assets/img/$fileName");
        }
    }

    public function getTotalProducts()
    {
        return $this->db->count_all('product');
    }
}

/* End of file Product_model.php */
