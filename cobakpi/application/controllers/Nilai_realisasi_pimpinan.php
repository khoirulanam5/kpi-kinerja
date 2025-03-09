<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_realisasi_pimpinan extends CI_Controller {

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
		$data['title'] = "Daftar Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		
		$jabatan = $this->session->userdata('jabatan');

		if($jabatan == 'Manajer Pemasaran' || $jabatan == 'Supervisor ADK' || $jabatan == 'Supervisor Pely Intern' || $jabatan == 'Supervisor Pely Kas' || $jabatan == 'Supervisor Adm Unit') {
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
		$this->compose_view('pimpinan/nilai_realisasi', $data);
	}

	public function pimpinan()
	{
		$data['title'] = "Daftar Nilai Realisasi";
		$data['active'] = "Nilai Realisasi Pimpinan";
		$data['tahun_realisasi'] = $this->m_kpi->ambil_bulan_kpi_dalam2($this->session->userdata('id_pimpinan'));

		$this->compose_view('pimpinan/nilai_realisasi_pimpinan', $data);
	}

	public function daftar_nilai($id_karyawan, $nama)
	{
		$data['title'] = "Daftar Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['nama_karyawan'] = urldecode($nama);
		$data['id_karyawan'] = $id_karyawan;
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi_luar($id_karyawan);

		$this->compose_view('pimpinan/tahun_realisasi', $data);
	}

	public function daftar_nilai_pimpinan($id_pimpinan, $nama)
	{
		$data['title'] = "Daftar Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['nama_karyawan'] = urldecode($nama);
		$data['id_karyawan'] = $id_pimpinan;
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi_luar2($id_pimpinan);

		$this->compose_view('pimpinan/tahun_realisasi', $data);
	}

	public function tambah_nilai($id_karyawan, $nama)
	{
		$data['title'] = "Tambah Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['nama_karyawan'] = $nama;
		$data['id_karyawan'] = $id_karyawan;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_item_kpi_luar($this->session->userdata('id_divisi'));
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi_luar($id_karyawan);

		$this->compose_view('pimpinan/tambah_nilai', $data);
	}

	public function tambah_nilai_pimpinan()
	{
		$data['title'] = "Tambah Nilai Realisasi";
		$data['active'] = "Nilai Realisasi Pimpinan";
		$data['nilai_realisasi'] = $this->m_kpi->ambil_item_kpi_dalam($this->session->userdata('id_divisi'));
		$data['tahun_realisasi'] = $this->m_kpi->ambil_tahun_kpi_dalam2($this->session->userdata('id_pimpinan'));

		$this->compose_view('pimpinan/tambah_nilai_pimpinan', $data);
	}

	public function tambah_nilai_form($id_karyawan) {
		setlocale(LC_ALL, 'IND');
		foreach($this->input->post('id_item_kpi[]') as $key1 => $id_item_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$data = array(
						'id_karyawan' => $id_karyawan,
						'id_item_kpi' => $id_item_kpi,
						'tahun' => date("Y"),
						'bulan' => strftime('%B'),
						'nilai' => $nilai
					);
					$this->m_kpi->tambah_nilai($data);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil ditambah!</div>');
		redirect('nilai_realisasi_pimpinan/daftar_nilai/'.$id_karyawan.'/'.$this->m_users->ambil_nama_karyawan_byid($id_karyawan));
	}

	public function tambah_nilai_pimpinan_form() {
		setlocale(LC_ALL, 'IND');
		foreach($this->input->post('id_item_kpi[]') as $key1 => $id_item_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$data = array(
						'id_pimpinan' => $this->session->userdata('id_pimpinan'),
						'id_item_kpi' => $id_item_kpi,
						'tahun' => date("Y"),
						'bulan' => strftime('%B'),
						'nilai' => $nilai
					);
					$this->m_kpi->tambah_nilai_pimpinan($data);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil ditambah!</div>');
		redirect('nilai_realisasi_pimpinan/pimpinan');
	}

	public function tambah_nilai_pimpinan_form2($id_pimpinan, $nama_karyawan) {
		setlocale(LC_ALL, 'IND');
		foreach($this->input->post('id_item_kpi[]') as $key1 => $id_item_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$data = array(
						'id_pimpinan' => $id_pimpinan,
						'id_item_kpi' => $id_item_kpi,
						'tahun' => date("Y"),
						'bulan' => strftime('%B'),
						'nilai' => $nilai
					);
					$this->m_kpi->tambah_nilai_pimpinan($data);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil ditambah!</div>');
		redirect('nilai_realisasi_pimpinan/daftar_nilai_pimpinan/'.$id_pimpinan.'/'.$nama_karyawan);
	}

	public function edit_nilai($tahun, $id_karyawan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['tahun'] = $tahun;
		$data['id_karyawan'] = $id_karyawan;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_luar($id_karyawan, $tahun);

		$this->compose_view('pimpinan/edit_nilai', $data);
	}

	public function edit_nilai_pimpinan($tahun)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi Pimpinan";
		$data['tahun'] = $tahun;
		$data['id_pimpinan'] = $this->session->userdata('id_pimpinan');
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_dalam2($this->session->userdata('id_pimpinan'), $tahun);

		$this->compose_view('pimpinan/edit_nilai_pimpinan', $data);
	}

	public function edit_nilai_pimpinan2($tahun, $id_pimpinan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['tahun'] = $tahun;
		$data['id_pimpinan'] = $id_pimpinan;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_luar2($id_pimpinan, $tahun);

		$this->compose_view('pimpinan/edit_nilai_pimpinan', $data);
	}

	public function edit_nilai_form($tahun, $id_karyawan) {
		foreach($this->input->post('id_nilai_kpi[]') as $key1 => $id_nilai_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$this->m_kpi->edit_nilai($id_nilai_kpi, $nilai);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil diperbarui!</div>');
		redirect('nilai_realisasi_pimpinan/edit_nilai/'.$tahun.'/'.$id_karyawan);
	}

	public function edit_nilai_pimpinan_form($tahun, $id_pimpinan) {
		foreach($this->input->post('id_nilai_kpi[]') as $key1 => $id_nilai_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$this->m_kpi->edit_nilai_pimpinan($id_nilai_kpi, $nilai);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil diperbarui!</div>');
		redirect('nilai_realisasi_pimpinan/pimpinan');
	}

	public function edit_nilai_pimpinan_form2($tahun, $id_pimpinan) {
		foreach($this->input->post('id_nilai_kpi[]') as $key1 => $id_nilai_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$this->m_kpi->edit_nilai_pimpinan($id_nilai_kpi, $nilai);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil diperbarui!</div>');
		redirect('nilai_realisasi_pimpinan/daftar_nilai_pimpinan/'.$id_pimpinan.'/'.$this->m_users->ambil_nama_pimpinan2($id_pimpinan));
	}

	public function detail_realisasi($tahun, $id_karyawan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['tahun'] = $tahun;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_luar($id_karyawan, $tahun);

		$this->compose_view('pimpinan/detail_realisasi', $data);
	}

	public function detail_realisasi_pimpinan($tahun)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi Pimpinan";
		$data['tahun'] = $tahun;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_dalam2($this->session->userdata('id_pimpinan'), $tahun);

		$this->compose_view('pimpinan/detail_realisasi', $data);
	}

	public function detail_realisasi_pimpinan2($tahun, $id_pimpinan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['tahun'] = $tahun;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_luar2($id_pimpinan, $tahun);

		$this->compose_view('pimpinan/detail_realisasi', $data);
	}
}
