<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends MY_Model
{
   protected $perPage = 10;

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nis',
                'label' => 'NIS',
                'rules' => 'trim|required|numeric|exact_length[4]|callback_nis_unik'
            ],
            [
                'field' => 'nama_santri',
                'label' => 'Nama Santri',
                'rules' => 'trim|required|max_length[50]|callback_alpha_coma_dash_dot_space'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_kamar',
                'label' => 'Kamar',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'nis'           => '',
            'nama_santri'   => '',
            'jenis_kelamin' => '',
            'id_kamar'      => '',
        ];
    }
}
