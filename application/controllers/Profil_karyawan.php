<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_karyawan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(2);
		$this->load->model('m_users');
	}

	public function compose_view($main_view, $data)
	{
		$this->load->view('karyawan/header', $data);
		$this->load->view($main_view, $data);
		$this->load->view('karyawan/footer');
	}

	public function index()
	{
		$data['title'] = "Profil Karyawan";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_karyawan($this->session->userdata('id_users'));

		$this->compose_view('karyawan/profil_karyawan', $data);
	}

	public function edit_profil()
	{
		$data['title'] = "Edit Profil Karyawan";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_karyawan($this->session->userdata('id_users'));

		$this->compose_view('karyawan/edit_profil', $data);
	}

	public function edit_profil_form() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->m_users->edit_users($this->session->userdata('id_users'), $data);

		$data = array(
			'nama_karyawan' => $this->input->post('nama_karyawan'),
			'jabatan' => $this->input->post('jabatan'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'sma' => $this->input->post('sma'),
			's1' => $this->input->post('s1'),
			's2' => $this->input->post('s2'),
			's3' => $this->input->post('s3'),
			'tanggal_masuk' => $this->input->post('tanggal_masuk')
		);

		$this->m_users->edit_karyawan($this->session->userdata('id_karyawan'), $data);

		redirect('profil_karyawan');
	}
}
