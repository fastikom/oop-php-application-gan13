<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends MY_Model
{
    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_kamar',
                'label' => 'Nama Kamar',
                'rules' => 'trim|required|min_length[1]|max_length[30]|callback_alpha_numeric_coma_dash_dot_space|callback_nama_kamar_unik'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'nama_kamar'    => ''
        ];
    }
}
