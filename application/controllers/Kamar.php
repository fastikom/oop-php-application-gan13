<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends Operator_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->halaman = 'kamar';
    }

	public function index($page = null)
	{
        $kamars     = $this->kamar->orderBy('nama_kamar')->getAll();
        $jumlah     = count($kamars);
        $halaman    = $this->halaman;
        $main_view  = 'kamar/index';
		$this->load->view('template', compact('halaman', 'main_view', 'kamars', 'jumlah'));
	}

	public function create()
	{
        if (!$_POST) {
            $input = (object) $this->kamar->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->kamar->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'kamar/form';
            $form_action = 'kamar/create';

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->kamar->insert($input)) {
            $this->session->set_flashdata('success', 'Data kamar berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data kamar gagal disimpan.');
        }

        redirect('kamar');
	}

	public function edit($id = null)
	{
        $kamar = $this->kamar->where('id_kamar', $id)->get();
        if (!$kamar) {
            $this->session->set_flashdata('warning', 'Data kamar tidak ada.');
            redirect('kamar');
        }

        if (!$_POST) {
            $input = (object) $kamar;
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->kamar->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'kamar/form';
            $form_action = "kamar/edit/$id";

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->kamar->where('id_kamar', $id)->update($input)) {
            $this->session->set_flashdata('success', 'Data kamar berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data kamar gagal diupdate.');
        }

        redirect('kamar');
	}

	public function delete($id = null)
	{
		$kamar = $this->kamar->where('id_kamar', $id)->get();
        if (!$kamar) {
            $this->session->set_flashdata('warning', 'Data kamar tidak ada.');
            redirect('kamar');
        }

        if ($this->kamar->where('id_kamar', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data kamar berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data kamar gagal dihapus.');
        }

		redirect('kamar');
	}


    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function alpha_numeric_coma_dash_dot_space($str)
    {
        if ( !preg_match('/^[a-zA-Z0-9 .,\-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_numeric_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,).');
            return false;
        }
    }

    public function nama_kamar_unik()
    {
        $nama_kamar = $this->input->post('nama_kamar');
        $id_kamar   = $this->input->post('id_kamar');

        $this->kamar->where('nama_kamar', $nama_kamar);
        !$id_kamar || $this->kamar->where('id_kamar !=', $id_kamar);
        $kamar = $this->kamar->get();

        if (count($kamar)) {
            $this->form_validation->set_message('nama_kamar_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}
