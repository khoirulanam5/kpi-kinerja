<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpi extends CI_Controller {

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
		$data['title'] = "Kelola KPI";
		$data['active'] = "KPI";
		$data['item_kpi'] = $this->m_kpi->ambil_item_kpi($this->session->userdata('id_divisi'));
		$data['item_kpi_dalam'] = $this->m_kpi->ambil_item_kpi_dalam($this->session->userdata('id_divisi'));
		$data['item_kpi_luar'] = $this->m_kpi->ambil_item_kpi_luar($this->session->userdata('id_divisi'));

		$this->compose_view('pimpinan/kpi', $data);
	}

	public function add_item_kpi() {
		$data['title'] = "Tambah Item KPI";
		$data['active'] = "KPI";

		$this->db->select('item_kpi.*, divisi.*');
		$this->db->from('item_kpi');
		$this->db->join('divisi', 'item_kpi.id_divisi = divisi.id_divisi');
		$data['item_kpi'] = $this->db->get()->result();

		$data['divisi'] = $this->db->get('divisi')->result();

		$this->compose_view('pimpinan/add_item_kpi', $data);
	}

	public function do_add_item_kpi() {
		$id_divisi = $this->input->post('id_divisi');
	
		if (empty($id_divisi)) {
			die("Error: ID Divisi tidak boleh kosong!");
		}
	
		$data = [
			'id_divisi' => $id_divisi,
			'nama_item' => $this->input->post('nama_item'),
			'indikator' => $this->input->post('indikator'),
			'bobot_item' => $this->input->post('bobot_item'),
			'target_item' => $this->input->post('target_item'),
			'satuan_target' => 'Persen',
			'tipe_scorecard' => $this->input->post('tipe_scorecard'),
			'Kategori' => '1'
		];
	
		$this->db->insert('item_kpi', $data);
		$this->session->set_flashdata("pesan","<script> Swal.fire({title:'Berhasil', text:'Tambah Item KPI Berhasil', icon:'success'})</script>");
		redirect('kpi');
	}	

	public function edit_item_kpi($id_item_kpi) {
		$data['title'] = "Edit Item KPI";
		$data['active'] = "KPI";

		$data['item_kpi'] = $this->m_kpi->ambil_item_kpi_byid($id_item_kpi);

		$this->compose_view('pimpinan/edit_item_kpi', $data);
	}

	public function edit_item_kpi_form() {
		$data = array(
			'nama_item' => $this->input->post('nama_item'),
			'indikator' => $this->input->post('indikator'),
			'bobot_item' => $this->input->post('bobot_item'),
			'target_item' => $this->input->post('target_item')
		);

		$this->m_kpi->edit_item_kpi($this->input->post('id_item_kpi'), $data);
		$this->session->set_flashdata("pesan","<script> Swal.fire({title:'Berhasil', text:'Edit Item KPI Berhasil', icon:'success'})</script>");
		redirect('kpi');
	}

	public function delete($id_item_kpi) {
		$this->db->where('id_item_kpi', $id_item_kpi);
		$this->db->delete('item_kpi');
		$this->session->set_flashdata("pesan","<script> Swal.fire({title:'Berhasil', text:'Hapus Item KPI Berhasil', icon:'success'})</script>");
		redirect('kpi');
	}
}
