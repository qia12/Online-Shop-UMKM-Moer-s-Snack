<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends MY_Model
{

    public $table = 'category';
    protected $perPage = 5;


    public function getDefaultValues()
    {
        return [
            'id'     => '',
            'slug'    => '',
            'title' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'slug',
                'label'    => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ],
            [
                'field'    => 'title',
                'label'    => 'Kategori',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function hasAssociatedProducts($category_id)
    {
        $this->db->where('id_category', $category_id);
        $query = $this->db->get('product'); // Ganti 'products' dengan nama tabel produk Anda
        return $query->num_rows() > 0;
    }
}

/* End of file Category_model.php */
