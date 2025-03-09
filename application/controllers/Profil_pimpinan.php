<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_pimpinan extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->simple_login->cek_login(1);
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
		$data['title'] = "Profil Penilai";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_pimpinan($this->session->userdata('id_users'));

		$this->compose_view('pimpinan/profil_pimpinan', $data);
	}

	public function edit_profil()
	{
		$data['title'] = "Edit Profil penilai";
		$data['active'] = "Profil";
		$data['profil'] = $this->m_users->ambil_profil_pimpinan($this->session->userdata('id_users'));

		$this->compose_view('pimpinan/edit_profil', $data);
	}

	public function edit_profil_form() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->m_users->edit_users($this->session->userdata('id_users'), $data);

		$data = array(
			'nama_pimpinan' => $this->input->post('nama_pimpinan'),
			'jabatan' => $this->input->post('jabatan'),
			'umur' => $this->input->post('umur'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp')
		);

		$this->m_users->edit_pimpinan($this->session->userdata('id_pimpinan'), $data);
		$this->session->set_userdata('nama', $this->input->post('nama_pimpinan'));

		redirect('profil_pimpinan');
	}
}
