<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller //deklarasi class Home()  mengwxtend class MY_Controller()
{
	public function __construct() //baris 5- 9construktor
    {
        parent::__construct();
        $this->halaman = 'home';
    }

	public function index($page = null) //method index() untunkmenampilkan halaman homepage
	{
        $halaman    = $this->halaman;
        $main_view  = 'home/index'; //Menentukan file view utama yang akan ditampilkan . akan ditampilkan file view/home/index.php
		$this->load->view('template', compact('halaman', 'main_view')); //memanggil view view/template.php serta variabel yang diperlukan pada template.php
	}
}
