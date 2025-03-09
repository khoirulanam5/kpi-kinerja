<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_realisasi extends CI_Controller {

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
		$data['title'] = "Daftar Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['bulan_realisasi'] = $this->m_kpi->ambil_bulan_kpi_dalam($this->session->userdata('id_karyawan'));

		$this->compose_view('karyawan/nilai_realisasi', $data);
	}

	public function tambah_nilai()
	{
		$data['title'] = "Tambah Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['nilai_realisasi'] = $this->m_kpi->ambil_item_kpi_dalam($this->session->userdata('id_divisi'));
		$data['bulan_realisasi'] = $this->m_kpi->ambil_bulan_kpi_dalam($this->session->userdata('id_karyawan'));

		$this->compose_view('karyawan/tambah_nilai', $data);
	}

	public function tambah_nilai_form() {
		foreach($this->input->post('id_item_kpi[]') as $key1 => $id_item_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$data = array(
						'id_karyawan' => $this->session->userdata('id_karyawan'),
						'id_item_kpi' => $id_item_kpi,
						'tahun' => date("Y"),
						'bulan' => $this->input->post('bulan'),
						'nilai' => $nilai
					);
					$this->m_kpi->tambah_nilai($data);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil ditambah!</div>');
		redirect('nilai_realisasi');
	}

	public function edit_nilai($bulan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['bulan'] = $bulan;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_dalam($this->session->userdata('id_karyawan'), $bulan);

		$this->compose_view('karyawan/edit_nilai', $data);
	}

	public function edit_nilai_form($bulan) {
		foreach($this->input->post('id_nilai_kpi[]') as $key1 => $id_nilai_kpi) {
			foreach($this->input->post('nilai[]') as $key2 => $nilai) {
				if($key1 == $key2) {
					$this->m_kpi->edit_nilai($id_nilai_kpi, $nilai);
					break;
				}
			}
		}

		$this->session->set_flashdata('hasil','<div class="alert alert-success text-center">Nilai Realisasi berhasil diperbarui!</div>');
		redirect('nilai_realisasi/edit_nilai/'.$bulan);
	}

	public function detail_realisasi($bulan)
	{
		$data['title'] = "Detail Nilai Realisasi";
		$data['active'] = "Nilai Realisasi";
		$data['bulan'] = $bulan;
		$data['nilai_realisasi'] = $this->m_kpi->ambil_detail_kpi_dalam($this->session->userdata('id_karyawan'), $bulan);

		$this->compose_view('karyawan/detail_realisasi', $data);
	}
}
