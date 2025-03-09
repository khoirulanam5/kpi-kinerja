<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_karyawan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('karyawan/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('karyawan/footer');
	}

	public function index()
	{
		$data['title'] = "Log In";
		$data['active'] = "Nilai Realisasi";

		$this->compose_view('karyawan/main', $data);
	}
}
