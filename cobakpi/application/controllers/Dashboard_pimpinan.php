<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pimpinan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('pimpinan/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('pimpinan/footer');
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['active'] = "Nilai Realisasia";

		$this->compose_view('pimpinan/main', $data);
	}
}
