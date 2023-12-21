<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends MY_Model
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'        => '',
            'address'    => '',
            'phone'        => '',
            'postal_code'        => '',
            'status'    => ''
            // 'province'    => '',
            // 'city'    => '',
            // 'expedisi'    => '',
            // 'package'    => '',
            // 'shipping_cost'    => '',
            // 'estimate'    => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field'    => 'name',
                'label'    => 'Nama',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'address',
                'label'    => 'Alamat',
                'rules'    => 'trim|required'
            ],
            [
                'field'    => 'phone',
                'label'    => 'Telepon',
                'rules'    => 'trim|required|min_length[10]|max_length[15]'
            ], [
                'field'    => 'postal_code',
                'label'    => 'Telepon',
                'rules'    => 'required|numeric'
            ]
            // [
            //     'field'    => 'province',
            //     'label'    => 'Provinsi',
            //     'rules'    => 'required'
            // ],
            // [
            //     'field'    => 'city',
            //     'label'    => 'Kota/Kabupaten',
            //     'rules'    => 'required'
            // ],
            // [
            //     'field'    => 'expedisi',
            //     'label'    => 'Expedisi',
            //     'rules'    => 'required'
            // ],
            // [
            //     'field'    => 'package',
            //     'label'    => 'Package',
            //     'rules'    => 'required'
            // ],
            // [
            //     'field'    => 'shipping_cost',
            //     'label'    => 'Ongkir',
            //     'rules'    => 'required'
            // ],
            // [
            //     'field'    => 'estimate',
            //     'label'    => 'Estimasi',
            //     'rules'    => 'required'
            // ],
        ];

        return $validationRules;
    }
}

/* End of file Checkout_model.php */
