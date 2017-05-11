<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends MY_Model /* class Login mengextend My_model*/
{
    public $table = 'user';/*variable $table, dipakai untuk tabel User*/

    public function getValidationRules() /*menentukan variable yang dipakai untuk input username dan password*/
    {
        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'username'    => '',
            'password' => ''
        ];
    }

    public function login($input)/*method login() memproses login*/
    {
        $input->password = md5($input->password);/*mengEnkripsi password ke dalam encrypt md5*/

        $user = $this->db->where('username', $input->username)/*mencari username yang diinputkan user*/
                          ->where('password', $input->password)/*mencari password yang diinputkan user*/
                          ->where('is_blokir', 'n')
                          ->limit(1)
                          ->get($this->table)
                          ->row();

        if (count($user)) { /*jika username dan password benar maka set sesion yang terdiri dari data username, level, dan is_login*/
            $data = [
                'username' => $user->username,
                'level'    => $user->level,
                'is_login' => true
            ];

            $this->session->set_userdata($data);
            return true;
        }

        return false;/*jika salah kembalikan nilai false yang diinputkan*/
    }

    public function logout() /*method ini digunakan untuk mereset semua sessions login saat ini , dan men-destroy sesions untuk memastikan data session sudah tidka ada */
    {
        $data = [
            'username' => null,
            'level'    => null,
            'is_login' => null
        ];
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
    }
}
