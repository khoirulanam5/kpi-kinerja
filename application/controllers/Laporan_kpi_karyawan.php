<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kpi_karyawan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
		$this->load->model('m_kpi');
		$this->load->model('m_users');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('pimpinan/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('pimpinan/footer');
	}

	public function index()
	{
		$data['title'] = "Laporan KPI";
		$data['active'] = "Laporan KPI";
		
		$jabatan = $this->session->userdata('jabatan');

		if($jabatan == 'Manajer Pemasaran' || $jabatan == 'HRD' || $jabatan == 'Supervisor Pely Intern' || $jabatan == 'Supervisor Pely Kas' || $jabatan == 'Supervisor Adm Unit') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_pimpinan($this->session->userdata('id_pimpinan'));
			$data['bos'] = 1;
		}elseif($jabatan == 'Manajer Operasional') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_byjb2('AMPB', 'AMO');
		}elseif($jabatan == 'AMPB') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_byjb2('Supervisor ADK', 'Supervisor Pely Intern');
		}elseif($jabatan == 'AMO') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_byjb1('Supervisor Pely Kas');
		}elseif($jabatan == 'Manajer Bisnis Mikro') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_byjb1('AMBM');
		}elseif($jabatan == 'AMBM') {
			$data['daftar_karyawan'] = $this->m_users->ambil_karyawan_byjb2('Supervisor Adm Unit', 'Penilik');
		}

		$this->compose_view('pimpinan/laporan_kpi', $data);
	}

	public function history($id_karyawan, $nama) {
		$data['title'] = "Laporan KPI";
		$data['active'] = "Laporan KPI";
		$data['nama_karyawan'] = $nama;
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi($id_karyawan);
		$data['nilai_realisasi'] = $this->m_kpi->ambil_nilai_kpi($id_karyawan);
		$data['nilai_realisasi_dalam'] = $this->m_kpi->ambil_nilai_kpi_dalam($id_karyawan);
		$data['nilai_realisasi_luar'] = $this->m_kpi->ambil_nilai_kpi_luar($id_karyawan);

		$this->compose_view('pimpinan/history_kpi', $data);
	}

	public function pimpinan()
	{
		$data['title'] = "Laporan KPI";
		$data['active'] = "Laporan KPI Pimpinan";
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi2($this->session->userdata('id_pimpinan'));
		$data['nilai_realisasi'] = $this->m_kpi->ambil_nilai_kpi2($this->session->userdata('id_pimpinan'));
		$data['nilai_realisasi_dalam'] = $this->m_kpi->ambil_nilai_kpi_dalam2($this->session->userdata('id_pimpinan'));
		$data['nilai_realisasi_luar'] = $this->m_kpi->ambil_nilai_kpi_luar2($this->session->userdata('id_pimpinan'));

		$this->compose_view('karyawan/laporan_kpi', $data);
	}

	// $data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi($this->session->userdata('id_karyawan'));
	// $data['nilai_realisasi'] = $this->m_kpi->ambil_nilai_kpi($this->session->userdata('id_karyawan'));
}
