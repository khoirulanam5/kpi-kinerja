<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kpi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_kpi');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('karyawan/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('karyawan/footer');
	}

	public function index()
	{
		$data['title'] = "Laporan KPI";
		$data['active'] = "Laporan KPI";
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi($this->session->userdata('id_karyawan'));
		$data['nilai_realisasi'] = $this->m_kpi->ambil_nilai_kpi($this->session->userdata('id_karyawan'));
		$data['nilai_realisasi_dalam'] = $this->m_kpi->ambil_nilai_kpi_dalam($this->session->userdata('id_karyawan'));
		$data['nilai_realisasi_luar'] = $this->m_kpi->ambil_nilai_kpi_luar($this->session->userdata('id_karyawan'));

		$this->compose_view('karyawan/laporan_kpi', $data);
	}
}
