<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
/clas login mengexten MY_Controller
*/
class Login extends MY_Controller
{
/*method index , method ini akan menangani proses login*/
	public function index()
    {
/* mengatur nilai variabel $input yang akan dipakai pada form */
		    if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

/*jika validaasi gagal, maka akan ditampilkan kembali form tersebut beserta pesan kesalahan dan data yang diinputkan sebelumnya*/
        if (!$this->login->validate()){
            $this->load->view('login_form', compact('input'));
            return;
        }
/*jika proses validasi berhasil akan dialihkan ke base_url(), bila gagal akan muncul pesan errors mengapa tidak bisa login*/
        if ($this->login->login($input)) {
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah, atau akun anda sedang diblokir.');
        }

        redirect('login');
	}

	public function logout()/*untuk memangil method logut() pada Login_model{}, jika logout berhasil akan dialihkan ke homepage */
	{
        $this->login->logout();
        redirect(base_url());
	}
}
