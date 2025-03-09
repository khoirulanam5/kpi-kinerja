<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	/* 
		Level User :
		1. Pimpinan
		2. Karyawan
	*/

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($username,$password,$level) {
		$query = $this->CI->db->get_where('users', array('username'=>$username,'password' =>$password,'level' => $level));
		if($query->num_rows() == 1) {
			$users 	= $this->CI->db->query('SELECT * FROM users where username = "'.$username.'"')->row();
			$this->CI->session->set_userdata('id_users', $users->id_users);
			$this->CI->session->set_userdata('username', $users->username);
			$this->CI->session->set_userdata('level', $users->level);
			if($users->level == 1) {
				$this->CI->load->model('m_users');

				$jabatan = $this->CI->m_users->ambil_jabatan_pimpinan($users->id_users);
				if($jabatan == 'Manajer Pemasaran' || $jabatan == 'Supervisor ADK' || $jabatan == 'Supervisor Pely Intern' || $jabatan == 'Supervisor Pely Kas' || $jabatan == 'Supervisor Adm Unit' || $jabatan == 'AMPB' || $jabatan == 'AMO' || $jabatan == 'AMBM') {
					$status = 1;
				}else{
					$status = 0;
				}

				if($jabatan == 'Manajer Pemasaran' || $jabatan == 'Manajer Operasional' || $jabatan == 'Manajer Bisnis Mikro') {
					$bos = 1;
				}else{
					$bos = 0;
				}

				if($jabatan == 'Manajer Operasional' || $jabatan == 'Manajer Bisnis Mikro' || $jabatan == 'AMPB' || $jabatan == 'AMO' || $jabatan == 'AMBM') {
					$bos2 = 1;
				}else{
					$bos2 = 0;
				}

				$data_session = array(
					'id_pimpinan' => $this->CI->m_users->ambil_id_pimpinan($users->id_users),
					'id_divisi' => $this->CI->m_users->ambil_id_divisi_pimpinan($users->id_users),
					'nama' => $this->CI->m_users->ambil_nama_pimpinan($users->id_users),
					'jabatan' => $jabatan,
					'nama_divisi' => $this->CI->m_users->ambil_divisi_pimpinan($users->id_users),
					'status' => $status,
					'bos' => $bos,
					'bos2' => $bos2		
				);
				$this->CI->session->set_userdata($data_session);
				redirect('laporan_kpi_karyawan');
			}elseif($users->level == 2) {
				$this->CI->load->model('m_users');

				$jabatan = $this->CI->m_users->ambil_jabatan_karyawan($users->id_users);
				if($jabatan == 'Manajer Pemasaran' || $jabatan == 'Supervisor ADK' || $jabatan == 'Supervisor Pely Intern' || $jabatan == 'Supervisor Pely Kas' || $jabatan == 'Supervisor Adm Unit') {
					$status = 1;
				}else{
					$status = 0;
				}

				$data_session = array(
					'id_karyawan' => $this->CI->m_users->ambil_id_karyawan($users->id_users),
					'id_divisi' => $this->CI->m_users->ambil_id_divisi_karyawan($users->id_users),
					'nama' => $this->CI->m_users->ambil_nama_karyawan($users->id_users),
					'jabatan' => $jabatan,
					'nama_divisi' => $this->CI->m_users->ambil_divisi_karyawan($users->id_users),
					'status' => $status	
				);
				$this->CI->session->set_userdata($data_session);
				redirect('nilai_realisasi');
			}
		}else{                
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-danger text-center">Oops... Username/password salah!</div>');
			redirect('login');
		}
	}

	// Proteksi halaman
	public function cek_login($level) {
		if($this->CI->session->userdata('level') != $level) {
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center">Anda Belum Log In!</div>');
			redirect('login');
		}
	}

	public function login_super($level1,$level2) {
		if($this->CI->session->userdata('level') != $level1 && $this->CI->session->userdata('level') != $level2){
			$this->CI->session->set_flashdata('sukses','<div class="alert alert-warning text-center" align="center">Anda Belum Log In!</div>');
			redirect('login');
		}else{
			return $this->CI->session->userdata('level');
		}
	}

	// Fungsi logout
	public function logout() {
		$this->CI->session->unset_userdata('id_users');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('level');
		$this->CI->session->unset_userdata('status');
		$this->CI->session->unset_userdata('id_pelanggan');
		$this->CI->session->unset_userdata('id_divisi');
		$this->CI->session->unset_userdata('jabatan');
		$this->CI->session->set_flashdata('sukses','<div class="alert alert-success text-center">Anda Berhasil Log Out!</div>');
		redirect('login');
	}
}