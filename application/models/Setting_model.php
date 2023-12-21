<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends MY_Model
{


    public $table = 'setting';


    public function getDefaultValues()
    {
        return [
            'id_user'     => '',
            'name'     => '',
            'location' => '',
            'address' => '',
            'phone' => ''
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
                'field'    => 'id_user',
                'label'    => 'User',
                'rules'    => 'required'
            ],
            [
                'field'    => 'address',
                'label'    => 'Alamat',
                'rules' => 'trim|required'
            ],
            [
                'field'    => 'phone',
                'label'    => 'No Telp',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }
}


// class My_model extends CI_Model
// {
//     public function data_setting()
//     {
//         $this->db->select('*');
//         $this->db->from('setting');
//         $this->db->where('id', 1);
//         return $this->db->get()->row;
//     }
// }


/* End of file Category_model.php */
