<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends Operator_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->halaman = 'santri';
    }

	public function index($page = null)
	{
        $santris     = $this->santri->join('kamar')->orderBy('kamar.id_kamar')->orderBy('nama_santri')->paginate($page)->getAll();
        $jml        = $this->santri->join('kamar')->orderBy('kamar.id_kamar')->orderBy('nama_santri')->getAll();
        $jumlah     = count($jml);
        $halaman    = $this->halaman;
        $main_view  = 'santri/index';
        $pagination = $this->santri->makePagination(site_url('santri'), 2, $jumlah);

		$this->load->view('template', compact('halaman', 'main_view', 'santris', 'pagination', 'jumlah'));
	}

	public function create()
	{
        if (!$_POST) {
            $input = (object) $this->santri->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->santri->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'santri/form';
            $form_action = 'santri/create';

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->santri->insert($input)) {
            $this->session->set_flashdata('success', 'Data santri berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data santri gagal disimpan.');
        }

        redirect('santri');
	}

	public function edit($id = null)
	{
        $santri = $this->santri->where('id_santri', $id)->get();
        if (!$santri) {
            $this->session->set_flashdata('warning', 'Data santri tidak ada.');
            redirect('santri');
        }

        if (!$_POST) {
            $input = (object) $santri;
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->santri->validate()) {
            $halaman     = $this->halaman;
            $main_view   = 'santri/form';
            $form_action = "santri/edit/$id";

            $this->load->view('template', compact('halaman', 'main_view', 'form_action', 'input'));
            return;
        }

        if ($this->santri->where('id_santri', $id)->update($input)) {
            $this->session->set_flashdata('success', 'Data santri berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data santri gagal diupdate.');
        }

        redirect('santri');
	}

	public function delete($id = null)
	{
		$santri = $this->santri->where('id_santri', $id)->get();
        if (!$santri) {
            $this->session->set_flashdata('warning', 'Data santri tidak ada.');
            redirect('santri');
        }

        if ($this->santri->where('id_santri', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data santri berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data santri gagal dihapus.');
        }

		redirect('santri');
	}

    public function search($page = null)
    {
        $keywords   = $this->input->get('keywords', true);
        $santris     = $this->santri->where('nis', $keywords)
                                  ->orLike('nama_santri', $keywords)
                                  ->join('kamar')
                                  ->orderBy('kamar.id_kamar')
                                  ->orderBy('nama_santri')
                                  ->paginate($page)
                                  ->getAll();
        $jml        = $this->santri->where('nis', $keywords)
                                  ->orLike('nama_santri', $keywords)
                                  ->join('kamar')
                                  ->orderBy('kamar.id_kamar')
                                  ->orderBy('nama_santri')
                                  ->getAll();
        $jumlah = count($jml);

        $pagination = $this->santri->makePagination(site_url('santri/search/'), 3, $jumlah);

        if (!$santris) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect('santri');
        }

        $halaman    = $this->halaman;
        $main_view  = 'santri/index';
        $this->load->view('template', compact('halaman', 'main_view', 'santris', 'pagination', 'jumlah'));
    }

    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function alpha_coma_dash_dot_space($str)
    {
        if ( !preg_match('/^[a-zA-Z .,\-]+$/i',$str) )
        {
            $this->form_validation->set_message('alpha_coma_dash_dot_space', 'Hanya boleh berisi huruf, spasi, tanda hubung(-), titik(.) dan koma(,).');
            return false;
        }
    }

    public function nis_unik()
    {
        $nis      = $this->input->post('nis');
        $id_santri = $this->input->post('id_santri');

        $this->santri->where('nis', $nis);
        !$id_santri || $this->santri->where('id_santri !=', $id_santri);
        $santri = $this->santri->get();

        if (count($santri)) {
            $this->form_validation->set_message('nis_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}
